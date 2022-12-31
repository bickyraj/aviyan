<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['imageUrl', 'thumbImageUrl', 'embedLink'];

    public function getImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/video-galleries');
            return $image_url . '/' . $this->attributes['id'] . '/' . $this->attributes['image_name'];
        }
        return config('constants.default_image_url');
    }

    public function getThumbImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/video-galleries');
            return $image_url . '/' . $this->attributes['id'] . '/thumb_' . $this->attributes['image_name'];
        }
        return config('constants.default_image_url');
    }

    public function getEmbedLinkAttribute():string
    {
        if (isset($this->link) && !empty($this->link)) {
            $url = $this->link;
            parse_str( parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            if (isset($my_array_of_vars) && !empty($my_array_of_vars)) {
                return "https://www.youtube.com/embed/" . $my_array_of_vars['v'];
            }
        }

        return "";
    }

    public function getEmbedImgAttribute():string
    {
        if (isset($this->link) && !empty($this->link)) {
            $url = $this->link;
            parse_str( parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            if (isset($my_array_of_vars) && !empty($my_array_of_vars)) {
            }   return "https://img.youtube.com/vi/" . $my_array_of_vars['v'] . "/maxresdefault.jpg";
        }

        return "";
    }

    public function getEmbedCodeAttribute():string
    {
        if (isset($this->link) && !empty($this->link)) {
            $url = $this->link;
            parse_str( parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            if (isset($my_array_of_vars) && !empty($my_array_of_vars)) {
                return $my_array_of_vars['v'];
            }
        }

        return "";
    }
}
