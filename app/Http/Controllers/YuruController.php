<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Page;

class YuruController extends Controller
{
    protected function home()
    {
        $page = Page::where('name','home')->first();
    	return view('yuru.home', [
            'page' => $page,
            'description' => explode('<br />', nl2br($page->description))
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
        $media = $page->media()->paginate(20);
        return view('yuru.page', [
            'page' => $page,
            'medias' => $media,
            'description' => explode('<br />', nl2br($page->description))
            ]);

    }

}
