<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->json()->all();
        $user_id = \Auth::id();
        $user_name = \Auth::user()->name;
        $comment = new Comment;
        $comment->comment_user_id = $user_id;
        $comment->content = $requestData['content'];
        $comment->board_id = $requestData['board_id'];
        $comment->save();

        $data = [
            'user_name' => $user_name,
            'time' => $comment->created_at,
            'content' => $comment->content,
            'valid' => 'true'
        ];

        $data = json_encode($data);

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
