<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'area_id', 'user_id'];

    public function area() {
        return $this->belongsTo(Area::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
