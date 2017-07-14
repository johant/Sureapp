<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','sale', 'address', 'contact', 'phone', 'cell', 'email', 'segmentation_id','client_id','web', 'trade_id','coach_id', 'area_id','observations', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function variants()
    {
        return $this->belongsToMany(Variant::class);
    }
    public function coach() {
        return $this->belongsTo(Coach::class);
    }
    public function segmentation() {
        return $this->belongsTo(Segmentation::class);
    }
}
