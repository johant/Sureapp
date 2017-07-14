<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['name', 'description', 'brand_id', 'segmentation_id','user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
        public function segmentation() {
        return $this->belongsTo(Segmentation::class);
    }
}
