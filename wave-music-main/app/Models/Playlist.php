<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'playlist_track')
            ->using(PlaylistTrack::class)
            ->withTimestamps()
            ->withPivot('order');
    }
}
