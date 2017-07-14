<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $casts = [
      'option_name' => 'array',
    ];
    protected $fillable = ['title', 'question_type', 'survey_id', 'user_id'];
    public function survey() {
        return $this->belongsTo(Survey::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
    public function option_answers()
    {
        return $this->hasMany(Option_answer::class);
    }

    protected $table = 'question';
}
