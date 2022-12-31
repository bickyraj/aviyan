<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = ['id'];

    protected $appends = ['imageUrl', 'thumbImageUrl', 'link'];

    public function getLinkAttribute()
    {
        // return route('front.team-members.show', ['slug' => $this->attributes['slug']]);
    }

    public function getImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/team-members');
            return $image_url . '/' . $this->attributes['id'] . '/' . $this->attributes['image_name'];
        }
        return config('constants.default_large_image_url');
    }

    public function getThumbImageUrlAttribute()
    {
        if (isset($this->attributes['image_name']) && !empty($this->attributes['image_name'])) {
            $image_url = url('/storage/team-members');
            return $image_url . '/' . $this->attributes['id'] . '/thumb_' . $this->attributes['image_name'];
        }
        return config('constants.default_image_url');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
