<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['customer_id', 'name', 'document', 'email', 'user_id'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function staff_note() {
        return $this->hasMany(Staff_note::class, 'staff_id');
    }
}
