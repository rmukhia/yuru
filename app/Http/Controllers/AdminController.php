<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use URL;
use Redirect;
use Image;
use File;
use Log;

use App\Page;
use App\Media;

class AdminController extends Controller
{
    private $largeFileDirectory = './uploads';

    private function getTemporaryUploadedMedia() 
    {
        return array_filter(scandir($this->largeFileDirectory), function($var) {
            if ($var == '.' || $var == '..')
                return false;
            return true;
        });
    }

    protected function getPage($page)
    {
        /* $page here is text ('home', 'rooms', etc) */

        /* This page does not exist */
        if (Page::where('name', $page)->count() == 0) {
            abort(404);
        }

        $page = Page::where('name', $page)->first();
        $media = $page->media()->paginate(6);
        return view('admin.edit', [
            'page' => $page,
            'medias' => $media,
            'uploadedMedias' => $this->getTemporaryUploadedMedia()
            ]);

    }

    protected function patchSavePage(Request $request, Page $page)
    {
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->save();
        return redirect(route('yuru.admin.page', ['page' => $page->name]));
    }

    /**
     * Upload Media Section 
     */
    private function saveCommonParameters(Request $request, Page $page)
    {
        $media = new Media();
        $media->page_id = $page->id;
        $media->description = $request->input('description', '');
        $media->type = $request->input('media-type');
        return $media;
    }

    private function saveThumbnail(Page $page, Media $media)
    {

        if($media->type == 'video') {
             $thumbnail = Image::make('./' . $page->getThumbnailURL($media))->widen($page->thumbnailWidth() , function ($constraint) {
                $constraint->upsize();
            });
            $thumbnail->save();
            $thumbnail->destroy();
        }
        else {
            $thumbnail = Image::make('./' . $page->getFilenameURL($media))->widen($page->thumbnailWidth() , function ($constraint) {
                $constraint->upsize();
            });
            $thumbnail->save('./' . $page->getThumbnailURL($media));
            $thumbnail->destroy();
        }
    }

    private function resizeImage(Page $page, Media $media)
    {
        $image = Image::make('./'. $page->getFilenameURL($media))->heighten($page->imageHeight(), function ($constraint) {
            $constraint->upsize();
        });
        $image->save('./' . $page->getFilenameURL($media));
        $image->destroy();
    }

    private function saveImageSimple(Request $request, Page $page)
    {
        $media = $this->saveCommonParameters($request, $page);

        // Check if file exists
        if (!$request->hasFile('file') || !$request->file('file')->isValid())
        {
            abort(500, 'File is not valid.');
        }

        // Set the filename
        $media->filename = $request->file('file')->getClientOriginalName();
        // Set the thumbnail filename
        $media->thumbnail_filename = $media->filename;

        $media->save();

        // Move file to permenant location
        $request->file('file')->move($page->getSavePath(), $media->getUniqueFilename());

        $this->resizeImage($page, $media);
        $this->saveThumbnail($page, $media);
    }

    private function saveImageLarge(Request $request, Page $page)
    {
        $media = $this->saveCommonParameters($request, $page);

        // Check if the specified file exists
        $uploadedFile = $request->input('uploaded-file','');
        if ($uploadedFile == '') {
            abort('Uploaded file is not valid.');
        }

        // Set the filename and thumbnail filename
        $media->filename = $media->thumbnail_filename = $uploadedFile;

        $media->save();

        // Move file to permenant location
        $uploadedPath = $this->largeFileDirectory . '/' . $uploadedFile;
        $newPath = $page->getSavePath() . '/' . $media->getUniqueFilename();

        File::move($uploadedPath, $newPath);

        $this->resizeImage($page, $media);
        $this->saveThumbnail($page, $media);
    }

    private function saveVideoLarge(Request $request, Page $page)
    {
        $media = $this->saveCommonParameters($request, $page);
        // Check if the specified file exists
        $uploadedFile = $request->input('uploaded-file','');
        if ($uploadedFile == '') {
            abort('Uploaded file is not valid.');
        }

        if (!$request->hasFile('video-thumbnail') || !$request->file('video-thumbnail')->isValid()) {
            abort(500, 'Video thumbnail is not valid.');
        }

        // Set the filename
        $media->filename = $uploadedFile;
        // Set the thumbnail filename
        $media->thumbnail_filename = $request->file('video-thumbnail')->getClientOriginalName();

        $media->save();

        // Move thumbnail file to permenant location
        $request->file('video-thumbnail')->move($page->getThumbnailSavePath(), $media->getUniqueThumbnailFilename());

        // Move file to permenant location
        $uploadedPath = $this->largeFileDirectory . '/' . $uploadedFile;
        $newPath = $page->getSavePath() . '/' . $media->getUniqueFilename();

        File::move($uploadedPath, $newPath);

        $this->saveThumbnail($page, $media);
    }

    protected function postUploadMedia(Request $request, Page $page)
    {
        // Check the type of media that is being uploaded
        switch($request->input('media-type', '')) {
            case 'image':
                switch($request->input('upload-method', '')) {
                    case 'simple':
                        $this->saveImageSimple($request, $page);
                        break;
                    case 'large':
                        $this->saveImageLarge($request, $page);
                        break;
                    default:
                        abort(500, 'Upload Method is not valid.');
                }
                break;
            case 'video':
                $this->saveVideoLarge($request, $page);
                break;
            default:
                abort(500, 'Invalid Media Type.');
        }

        return Redirect::back();
    }

    /**
     * End of upload media
     */
    

    protected function getDeleteMedia(Media $media)
    {
        $previousURL = URL::previous();
        return view('admin.deleteMedia', [
            'media' => $media,
            'previousURL' => $previousURL]);
    }

    protected function deleteDeleteMedia(Request $request, Media $media)
    {
        $previousURL =  $request->input('previousURL','/home');
        $media->delete();
        return redirect($previousURL);
    }

    /* Debug commands */

    private function refreshThumbnails()
    {
        $result = [];
        foreach(Media::all() as $media) {
            $page = $media->page;
            $this->saveThumbnail($page, $media);

            array_push($result, [ 'filename' => $media->filename, 'thumbnail_filename' => $media->thumbnail_filename, 'page' => $page->name]);
        }

        return $result;
    }

    protected function getDebug($command)
    {
        $result = [];
        switch ($command) {
            case 'refreshThumbnails':
                $result = $this->refreshThumbnails();
                break;
            default:
                array_push($result, 'Command not found');
        }

        return $result;
    }
}
