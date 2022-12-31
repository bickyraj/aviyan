<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    // type = [1 = administration, 2 = representatives, 3 = tour guides]

	protected $guarded = ['id'];

    protected $appends = ['imageUrl', 'thumbImageUrl', 'link'];

    /**
     * Get all of the post's comments.
     */
    public function menu_items()
    {
        return $this->morphMany('App\MenuItem', 'menu_itemable');
    }

    /**
     * Get the post's menu_item.
     */
    public function menu_item()
    {
        return $this->morphOne('App\MenuItem', 'menu_itemable');
    }

    public function getLinkAttribute()
    {
        return route('front.teams.show', ['slug' => $this->attributes['slug']]);
    }

    public function getImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/teams');
        	return $image_url . '/' . $this->attributes['id'] . '/' . $this->attributes['image_name'];
        }
        return config('constants.default_large_image_url');
    }

    public function getThumbImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/teams');
        	return $image_url . '/' . $this->attributes['id'] . '/thumb_' . $this->attributes['image_name'];
        }
        return config('constants.default_image_url');
    }

    public function certificates()
    {
        return $this->hasMany(TeamCertificate::class);
    }

    public function galleries()
    {
        return $this->hasMany(TeamGallery::class);
    }

    public function team_members()
    {
        return $this->hasMany(TeamMember::class, 'team_id', 'id');
    }
}
