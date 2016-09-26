<?php

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Page;


class LayoutComposer
{
	private function getBackgroundImageList()
	{
		$imagePath = 'page-elements/backgrounds';
		$images = array_filter(scandir($imagePath), function($var) {
            if ($var == '.' || $var == '..')
                return false;
            return true;
        });

        return '/' . $imagePath . '/' .$images[array_rand($images)];
	}

    public function compose(View $view)
    {
    	/* Get a list of all pages */
    	$allPages = Page::all();
    	$view->with('allPages', $allPages);

    	/* Background image */

    	$view->with('backgroundImage', $this->getBackgroundImageList());
    }
}