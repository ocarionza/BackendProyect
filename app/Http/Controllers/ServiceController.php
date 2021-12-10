<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
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
        $service = Service::create($request->post());

        return response()->json(['data' => $service], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  ServiceResource $service
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceResource $service)
    {
        return response()->json($service);
        // ->response()
        // ->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  ServiceResource $service
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceResource $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  ServiceResource $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceResource $service)
    {
        $service->update($request->all());

        return response()->json(['data' => $service], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  ServiceResource $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceResource $service)
    {
        $service->delete();
        return response(null, 204);
    }
}
