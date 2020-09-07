<?php

namespace App\Http\Controllers;

use App\Song;
use App\Artiste;
use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.songs.index')->with('songs',Song::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.songs.create')->with('artistes',Artiste::all());
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
            'name' => 'required|max:255',
            'image' => 'required',
            'lyrics'=> 'required',
            'artiste_id'=> 'required',
        ]);
        Song::create([
            'name' => $request->name,
            'image' => $request->image,
            'lyrics'=> $request->lyrics,
            'artiste_id'=> $request->artiste_id
        ]);
        return redirect()->route('songs.index')->with('songs',Song::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('admin.songs.show')->with('song',$song);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('admin.songs.edit')->with('song',$song)
                                        ->with('artistes',Artiste::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'lyrics'=> 'required',
            'artiste_id'=> 'required',
        ]);
        $song->update([
            'name' => $request->name,
            'image' => $request->image,
            'lyrics'=> $request->lyrics,
            'artiste_id'=> $request->artiste_id
        ]);
        return redirect()->route('songs.index')->with('songs',Song::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index')->with('songs',Song::all());
    }
}