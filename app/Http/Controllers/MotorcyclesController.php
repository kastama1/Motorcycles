<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
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
        $motorcycles = Motorcycle::all();
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
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uid = uniqid();
        $files = $request->images;
        foreach ($files as $file) {
            $path = $file->store("upload/" . $uid);
        }

        Motorcycle::create([
            'name' => $request->input('name'),
            'text' => $request->input('text'),
            'prize' => $request->input('prize'),
            'images' => "upload\\" . $uid,
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
        ]);

        Motorcycle::find($id)
        ->update([
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
        Motorcycle::find($id)->delete();

        return redirect(route('motorcycles.index'));
    }
}
