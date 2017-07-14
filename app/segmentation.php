<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segmentation extends Model
{
    protected $fillable = ['name', 'description', 'type', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
