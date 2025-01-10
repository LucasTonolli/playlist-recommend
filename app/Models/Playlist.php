<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'name',
        'spotify_id',
        'image_url',
        'music_quantity'
    ];
}
