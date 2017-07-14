<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
