<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey_start extends Model
{
    //
    public function survey() {
        return $this->belongsTo(Survey::class);
    }
        public function user() {
        return $this->belongsTo(User::class);
    }
}
