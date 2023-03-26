<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
class song extends Model
{
    use HasFactory;
    //use MediaAlly;
    protected $fillable = ['title', 'artist', 'band' , 'url' , 'cover_url' , 'duration' , 'release_date', 'lyrics', 'genre'];

    public function bands()
    {
        return $this->belongsToMany(Band::class);
    }
    public function genres()
    {
        return $this->belongsToMany(genre::class);
    }
    public function artists()
    {
        return $this->belongsToMany(artist::class);
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
    public function writers()
    {
        return $this->belongsToMany(Writer::class);
    }
    public function song_ratings()
    {
        return $this->hasMany(song_ratings::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_song');
    }
    public function comments()
{
    return $this->hasMany(comment::class)->with('user');;
}
}
