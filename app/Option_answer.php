<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option_answer extends Model
{
    protected $fillable = ['survey_id', 'question_id', 'answers'];
    protected $table = 'option_answers';
    public function question() {
      return $this->belongsTo(Question::class);
    }
}
