<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Media;

class Page extends Model
{
    public $timestamps = false;


    public function media()
    {
    	return $this->hasMany('App\Media');
    }

    public function thumbnailHeight() 
    {
        switch ($this->name) {
            case 'home':
                return 422;
            default:
                return 211;
        }
    }

    public function getSavePath()
    {
    	return 'media/' . $this->name;
    }

    public function getThumbnailSavePath()
    {
        return $this->getSavePath() . '/thumbnail';
    }

    public function getFilenameURL(Media $media)
    {
    	return '/'. $this->getSavePath() . '/' . $media->getUniqueFilename();
    }

    public function getThumbnailURL(Media $media)
    {
    	// if ($media->type == 'video') {
    	// 	return $this->getVideoPicFilenameURL($media);
    	// }
    	// else {
    	// 	return $this->getFilenameURL($media);
    	// }

        return '/'. $this->getThumbnailSavePath() . '/' . $media->getUniqueThumbnailFilename();
    }
}
