<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Comment;
use App\Http\Requests;

class CommentController extends Controller
{
    public function store(Request $request)
	{
	    if (Comment::create($request->all())) {
	        return redirect()->back();
	    } else {
	        return redirect()->back()->withInput()->withErrors('评论发表失败！');
	    }
	}
}
