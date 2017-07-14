<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['customer_id', 'started_at', 'followup_option_id', 'observations', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function followup_option() {
        return $this->belongsTo(Followup_option::class);
    }

}
