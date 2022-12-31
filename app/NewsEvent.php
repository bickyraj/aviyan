<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['imageUrl', 'thumbImageUrl', 'mediumImageUrl', 'link', 'formattedDate'];

    public function getImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/news-events');
            return $image_url . '/' . $this->attributes['id'] . '/' . $this->attributes['image_name'];
        }
        // return config('constants.default_large_image_url');
        return '';
    }

    public function getMediumImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/news-events');
            return $image_url . '/' . $this->attributes['id'] . '/medium_' . $this->attributes['image_name'];
        }
        // return config('constants.default_large_image_url');
        return '';
    }

    public function getThumbImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/news-events');
            return $image_url . '/' . $this->attributes['id'] . '/thumb_' . $this->attributes['image_name'];
        }
        // return config('constants.default_image_url');
        return '';
    }

    public function getLinkAttribute()
    {
        return route('front.news.show', ['slug' => $this->attributes['slug']]);
    }

    public function getFormattedDateAttribute()
    {
        return date('F j, Y', strtotime($this->attributes['event_date']));
    }
}
