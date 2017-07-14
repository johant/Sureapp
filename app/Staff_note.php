<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_note extends Model
{
    protected $table = 'staff_notes';
    public function staff() {
        return $this->belongsTo(Staff::class);
    }
        public function survey() {
        return $this->belongsTo(Survey::class);
    }
}
