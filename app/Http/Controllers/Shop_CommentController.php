<?php

namespace App\Http\Controllers;

use App\Http\Resources\Shop_CommentResource;
use App\Models\Shop_Comment;
use Illuminate\Http\Request;


class Shop_CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Shop_comment::all();
        return Shop_CommentResource::collection($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = Shop_comment::create($request->post());

        return response()->json(['data' => $comment], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Shop_comment $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Shop_comment $comment)
    {
        return (new Shop_CommentResource($comment))
        ->response()
        ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Shop_comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop_comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Shop_comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop_comment $comment)
    {
        $comment->update($request->all());

        return response()->json(['data' => $comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Shop_comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop_comment $comment)
    {
        $comment->delete();
        return response(null, 204);
    }
}
