<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['nickname', 'email', 'website', 'content', 'article_id'];

    /**
     * 获取关联到评论的帖子
     */
    public function hasArticle()
    {
        return $this->hasOne('App\Article', 'id', 'article_id');
    }
}
