<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'title',
        'user_id',
        'content'

        ];
    public function user(){

        return $this->belongsTo(User::class);
    }
    protected $dates = ['deleted_at'];

    public function categories(){

        return $this->belongsToMany(Category::class, "articles_categorise",
        "article_id",
        "category_id");

    }
    public function comments(){

        return $this->hasMany(Comment::class);

    }

}
