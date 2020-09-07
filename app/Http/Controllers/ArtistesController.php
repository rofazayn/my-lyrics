<?php

namespace App\Http\Controllers;

use App\Artiste;
use App\Category;
use App\song;
use Illuminate\Http\Request;

class ArtistesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artistes.index')->with('artistes',Artiste::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.artistes.create')->with('categories',Category::all());
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
            'name' => 'required|unique:artistes|max:255',
            'image' => 'required',
            'category_id'=> 'required'
        ]);
        Artiste::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('artistes.index')->with('artistes',Artiste::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function show(Artiste $artiste)
    {
        return view('admin.artistes.show')->with('artiste',$artiste);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function edit(Artiste $artiste)
    {
        return view('admin.artistes.edit')->with('artiste',$artiste)
                                        ->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artiste $artiste)
    {
        $request->validate([
            'name' => 'required|unique:artistes|max:255',
            'image' => 'required',
            'category_id'=> 'required'
        ]);
        $artiste->update([
            'name'=>$request->name,
            'image'=>$request->image,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('artistes.index')->with('artistes',Artiste::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artiste  $artiste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artiste $artiste)
    {
        foreach($artiste->songs as $song){
            $song->delete();
        }
        $artiste->delete();
        return back()->with('artistes',Artiste::all());
    }
}
