<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\Album;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $musics = Music::orderBy('id', 'DESC')->take(6)->get();
        $latest = Music::all()->last();
        return view('home1', compact('musics','latest'));
    }
    public function music(){
        $songs = Music::paginate('15');

        return view('music.index', compact('songs'));
    }

    public function showmusic($slug){
        $song = Music::where('slug', $slug)->firstOrFail();
        //Hints
        $song->views+=1;
        $song->save();
        $musics = Music::orderBy('id', 'DESC')->take(5)->where('id', '!=', $song->id)->get();
        return view('music.show', compact('song', 'musics'));
    }


    public function find(Request $request)
    {
        
        $musics = Music::orwhere('title','like', '%'.$request->keywords.'%')->orwhere('content','like', '%'.$request->keywords.'%')->get();
        return view('find', compact('musics'));
    }

    
    public function album(){
        $albums = Album::paginate('15');
        return view('album.index', compact('albums'));
    }

    public function showalbum($id){
        $album = Album::where('slug', $id)->firstOrFail();
        return view('album.show', compact('album'));
    }
}
