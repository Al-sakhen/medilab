<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\services\storeServiceRequest;
use App\Http\Requests\services\updateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeServiceRequest $request)
    {
        if( $request->hasFile('image') ){
            $file = $request->file('image');  // uploadedFile
            $path = $file->store('services' ,['disk' => 'public']);
        }

        Service::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $path,
        ]);

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.services.edit' , compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateServiceRequest $request, $id)
    {
        $service = Service::findOrFail($id);
        $old_image = $service->image;

        if($request->hasFile('image')){
            $file = $request->file('image');  // uploadedFile
            $path = $file->store('services' , ['disk' => 'public']);
        }

        $service->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $path ?? $old_image,
        ]);

        if($old_image && $request->hasFile('image')){
            Storage::disk('public')->delete($old_image);
        }


        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        if( $service->image ){
            Storage::disk('public')->delete($service->image);
        }

        return redirect()->route('services.index');
    }

}
