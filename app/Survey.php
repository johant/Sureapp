<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['title', 'description', 'client_id', 'category_id','user_id'];
    protected $dates = ['deleted_at'];
    protected $table = 'survey';

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function answers() {
        return $this->hasMany(Answer::class);
    }
        public function category() {
        return $this->belongsTo(Category::class);
    }
        public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
