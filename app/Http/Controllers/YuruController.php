<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Markdown;
use App\Page;

class YuruController extends Controller
{
    protected function home()
    {
        $page = Page::where('name','home')->first();
        return view('yuru.home', [
            'page' => $page,
            'description' => $page->description
            ]);
    }

    protected function getPage($page)
    {
        /* $page here is text ('home', 'rooms', etc) */

        /* This page does not exist */
        if (Page::where('name', $page)->count() == 0) {
            abort(404);
        }

        $page = Page::where('name', $page)->first();
        return view('yuru.page', [
            'page' => $page,
            'description' => $page->description
            ]);

    }

    protected function getContact()
    {
        $page = Page::where('name','contact')->first();
        return view('yuru.contact',
            [
            'page' => $page,
            'description' => explode('<br />', nl2br($page->description))
            ]);
    }

    protected function getImages($page)
    {
        if (Page::where('name', $page)->count() == 0) {
            abort(404);
        }

        $page = Page::where('name', $page)->first();

        $result = [];

        foreach($page->media as $media) {
            if ($media->type == 'video') {
                $video = [
                    'alt' => $media->description,
                    'src' => $page->getThumbnailURL($media),
                    'data-type' => 'html5video',
                    'data-image' => $page->getThumbnailURL($media),
                    'data-videomp4' => $page->getFilenameURL($media),
                    'data-description' => $media->description
                    ];

                array_push($result, $video);
            }
            else {
                $image = [
                    'alt' => $media->description,
                    'src' => $page->getThumbnailURL($media),
                    'data-image' => $page->getFilenameURL($media),
                    'data-description' => $media->description
                    ];

                array_push($result, $image);
            }
        }

        return $result;
    }

}
