<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    // Route::get('/artists', [ArtistController::class, 'index']);
    public function index()
    {
        $artists = Artist::all();
        // dd($artists);
        return view('artist.index', compact('artists'));
    }
    // Route::get('/artists/create', 
    // [ArtistController::class, 'create']);
    public function create()
    {
        return view('artist.create');
    }
    // Route::post('/artists', 
    // [ArtistController::class, 'store']);
    public function store(Request $request)
    {
        // dd($request->artist_name, $request->country);
        $artist = new Artist();
        $artist->name = trim($request->artist_name);
        $artist->country = $request->country;
        $artist->img_path = $request->image;
        $artist->save();
    }

    public function edit($id)
    {
        // dd($id);
        $artist = Artist::find($id);
        return view('artist.edit', compact('artist'));
    }
}
