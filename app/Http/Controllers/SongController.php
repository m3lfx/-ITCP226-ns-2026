<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = DB::table('songs as s')
            ->join('albums as al', 'al.id', '=', 's.album_id')
            ->join('artists as ar', 'al.artist_id', '=', 'ar.id')
            ->select('s.id', 's.title as song_name', 's.description', 'al.title as album_title', 'ar.name')
            ->orderBy('s.id', 'DESC')
            // ->get();
            ->paginate(15);
        // dd($songs);
        return view('song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
