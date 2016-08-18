<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    public function page()
    {
        return $this->belongsTo('App\Page');
    }

    private function getUniqueName($name)
    {
    	return $this->id . '_' . $name;
    }

    public function getUniqueFilename()
    {
        return $this->getUniqueName($this->filename);
    }

    public function getUniqueThumbnailFilename()
    {
        return $this->getUniqueName($this->thumbnail_filename);
    }
 
}
