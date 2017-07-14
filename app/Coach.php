<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = ['name', 'document','email','area_id', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function area() {
        return $this->belongsTo(Area::class);
    }
}
