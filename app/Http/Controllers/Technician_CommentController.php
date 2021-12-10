<?php

namespace App\Http\Controllers;

use App\Http\Resources\Technician_CommentResource;
use App\Models\Technician_Comment;
use Illuminate\Http\Request;

class Technician_CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians_comments = Technician_Comment::all();
        return Technician_CommentResource::collection($technicians_comments);
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
        $technician = Technician_Comment::create($request->post());

        return response()->json(['data' => $technician], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Technician_Comment $technician_comment
     * @return \Illuminate\Http\Response
     */
    public function show(Technician_Comment $technician_comment)
    {
        return (new Technician_CommentResource($technician_comment))
        ->response()
        ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Technician_Comment $technician_comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Technician_Comment $technician_comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Technician_Comment $technician_comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technician_Comment $technician_comment)
    {
        $technician_comment->update($request->all());

        return response()->json(['data' => $technician_comment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Technician_Comment $technician_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technician_Comment $technician_comment)
    {
        $technician_comment->delete();
        return response(null, 204);
    }
}
