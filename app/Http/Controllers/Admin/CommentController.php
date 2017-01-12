<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function index()
	{
	    return view('admin/comment/index')->withComments(Comment::all());
	}

	public function edit($id){
        return view('admin/comment/edit')->withComment(Comment::find($id));
    }

	public function update(Request $request, $id){
        $this->validate($request, [
            'nickname' => 'required',
            'email' => 'required', 
            'content' => 'required',
        ]);

        $comment = Comment::find($id);
        $comment->nickname = $request->get('nickname');
        $comment->email = $request->get('email');
        $comment->content = $request->get('content');
        $comment->website = $request->get('website');

        if ($comment->save()) {
            return redirect('admin/comment');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

	public function destroy($id)
	{
	    Comment::find($id)->delete();
	    return redirect()->back()->withInput()->withErrors('删除成功！');
	}
}