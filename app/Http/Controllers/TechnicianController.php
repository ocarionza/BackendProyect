<?php

namespace App\Http\Controllers;

use App\Http\Resources\TechnicianResource;
use App\Models\Technician;
use Illuminate\Http\Request;


class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians = Technician::all();
        return response()->json($technicians);
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
        $Technician = Technician::create($request->post());

        return response()->json(['data' => $Technician], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Technician $technician
     * @return \Illuminate\Http\Response
     */
    public function show(Technician $technician)
    {
        return response()->json($technician);
        // ->response()
        // ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Technician $technician
     * @return \Illuminate\Http\Response
     */
    public function edit(Technician $technician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Technician $technician
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technician $technician)
    {
        $technician->update($request->all());

        return response()->json(['data' => $technician], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Technician $technician
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technician $technician)
    {
        $technician->delete();
        return response(null, 204);
    }
}
