<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Artiste;
use App\Song;

class UIController extends Controller
{
    /*
        display the welcome page

    */
    public function index()
    {
        $song=Song::latest()->first();
        return view('ui.welcome')->with('songs',Song::orderBy('views','desc')->paginate(4))
                                ->with('categories',Category::all());
    }

    /*
        Show all songs page

    */
    public function songs()
    {
        return view('ui.songs')->with('songs',Song::orderBy('views','desc')->get())
                            ->with('categories',Category::all());
    }

    /*
        Show artiste page

    */
    public function artiste(Artiste $artiste)
    {
        return view('ui.artiste')->with('artiste',$artiste)
                                ->with('categories',Category::all());
    }

    /*
        Show song page

    */
    public function song(Song $song)
    {
        $views=$song->views;
        $song->views=$views+1;
        $song->save();
        return view('ui.song')->with('song',$song)
                                ->with('categories',Category::all());
    }

    public function category(Category $category)
    {
        return view('ui.category')->with('category',$category)
                                ->with('categories',Category::all());
    }

    public function favorites()
    {
        $user = auth()->user();
        return view('ui.favorites')->with('songs',$user->likes)
                                ->with('categories',Category::all());
    }

    public function like(Song $song)
    {
        if ($song->isfavorited()) {
            $song->favorites()->detach(auth()->id());
        }else{
            $song->favorites()->attach(auth()->id());
        }
        
        return view('ui._like')->with('song',$song);  
    }

    public function search(Request $request)
    {
        if($request->ajax()){
            if($request->has('search')&&$request->has('songs')){
                $songs=Song::where('name','like','%'.$request->search.'%')->get();
                
            }else if($request->has('search')&&$request->has('artiste')){
                $songs=Song::where('name','like','%'.$request->search.'%')
                            ->where('artiste_id','=',$request->artiste)->get();
            }else if($request->has('search')&&$request->has('category')){
                $allSongs=Song::where('name','like','%'.$request->search.'%')->get();
                $songs=[];
                foreach($allSongs as $song){
                    if($song->artiste->category->id==$request->category){
                        $songs[]=$song;
                    }
                }
            }else if($request->has('search')&&$request->has('favorites')){
                $allSongs=Song::all();
                $songs=[];
                foreach ($allSongs as $song) {
                    if($song->isfavorited()){
                        if (str_contains($song->name,$request->search)) {
                            $songs[]=$song;
                        }
                    }
                }
            }
            return view('ui.search')->with('songs',$songs);
        }
    }
    
}
