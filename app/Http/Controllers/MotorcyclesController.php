<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorcyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorcycles = Motorcycle::orderBy('created_at')->get();
        $storage = storage_path();
        
        foreach($motorcycles as $motorcycle){
            if($motorcycle->images){
                $images = Storage::disk('public')->allFiles( $motorcycle->images . "\\");
                $motorcycle->images = $images;
            }
        }
        
        return view('motorcycles.index', compact('motorcycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motorcycles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'text' => 'required',
            'prize' => 'required|integer',
            "images"    => "required|array",
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $uid = uniqid();
        $files = $request->images;
        foreach ($files as $file) {
            $file->store("images/" . $uid, ['disk' => 'public']);
        }

        Motorcycle::create([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'prize' => $request->input('prize'),
            'images' => "images/" . $uid,
        ]);
        
        return redirect(route('motorcycles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motorcycle = Motorcycle::find($id);

        if($motorcycle->images){
            $images = Storage::disk('public')->allFiles( $motorcycle->images . "\\");
            $motorcycle->images = $images;
        }

        return(view('motorcycles.show', compact('motorcycle')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motorcycle = Motorcycle::find($id);

        if($motorcycle->images){
            $images = Storage::disk('public')->allFiles( $motorcycle->images . "\\");
            $motorcycle->images = $images;
        }

        return view('motorcycles.edit', compact('motorcycle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'text' => 'required',
            'prize' => 'required|integer',
            "images"    => "nullable|sometimes|array",
            'images.*' => 'nullable|sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $motorcycle = Motorcycle::find($id);

        $files = $request->images;

        if($files !== null){
        foreach ($files as $file) {
            $file->store($motorcycle->images, ['disk' => 'public']);
            }
        }

        $motorcycle->update([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'prize' => $request->input('prize'),
        ]);

        return redirect(route('motorcycles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motorcycle = Motorcycle::find($id);

        Storage::deleteDirectory("public/" . $motorcycle->images);

        $motorcycle->delete();

        return redirect(route('motorcycles.index'));
    }

    public function deleteImage(Request $request)
    {
        $data = $request->all();

        if(Storage::exists('public/' . $data['name'])){
            Storage::delete('public/' . $data['name']);
        }
    }
}
