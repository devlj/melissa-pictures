<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','description','user_id'];

    public function photos() {
        return $this->belongsTo('App\Photos','album_id');
    }
}
