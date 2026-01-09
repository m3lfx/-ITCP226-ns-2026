<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $albums = Album::all();
        $albums = DB::table('artists AS ar')
            ->join('albums AS al', 'ar.id', '=', 'al.artist_id')
            ->select('al.id', 'al.title', 'ar.name', 'al.genre', 'al.date_released',)
            ->orderBy('al.id', 'DESC')
            // ->toSql();
            ->get();
        // dd($albums);
        return view('album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::all();
        return view('album.create', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album = Album::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'date_released' => $request->date_released,
            'artist_id' => $request->artist_id,
        ]);
        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $album = Album::find($id);
        $album = DB::table('artists AS ar')
            ->join('albums AS al', 'ar.id', '=', 'al.artist_id')
            ->where('al.id', $id)
            ->select('al.id', 'ar.name', 'al.title', 'al.genre', 'al.date_released', 'al.artist_id')
            ->first();
        // dd($albums);
        $artists = Artist::where('id', '<>', $album->artist_id)->get();
        // dd($artists);
        return view('album.edit', compact('album', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Album::where('id', $id)
            ->update([
                'title' => $request->title,
                'genre' => $request->genre,
                'date_released' => $request->date_released,
                'artist_id' => $request->artist_id,
            ]);

        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
