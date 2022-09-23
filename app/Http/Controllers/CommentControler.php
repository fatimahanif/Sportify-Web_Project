<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentControler extends Controller
{
    public function addComment(Request $request){
        $comment = new Comment();
        $comment->FirstName = $request->fName;
        $comment->LastName = $request->lName;
        $comment->Email = $request->email;
        $comment->PhoneNumber = $request->phoneNo;
        $comment->Subject = $request->subject;
        $comment->Message = $request->message;
        $comment->save();
        return redirect()->back();
    }
}
