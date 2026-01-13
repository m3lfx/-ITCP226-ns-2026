<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Album;
use App\Models\Song;
use Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::withTrashed()->get();
        // dd($songs);
        // $songs = DB::table('songs as s')
        // ->join('albums as al', 'al.id', '=', 's.album_id')
        // ->join('artists as ar', 'al.artist_id', '=', 'ar.id')
        // ->select('s.id', 's.title as song_name', 's.description', 'al.title as album_title', 'ar.name')
        // ->orderBy('s.id', 'DESC')
        // ->get();
        // ->paginate(15);
        // dd($songs);
        return view('song.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('song.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:30'],
            'description' => ['required', 'min:5', 'max:200'],
            'album_id' => 'required'
        ]);

        $song = Song::create([
            'title' => $request->title,
            'description' => $request->description,
            'album_id' => $request->album_id
        ]);
        return redirect()->route('songs.index');
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
        $song = Song::find($id);
        $album = Album::where('id', $song->album_id)->first();

        $albums = Album::where('id', '<>', $song->album_id)->get();

        return view('song.edit', compact('albums', 'song', 'album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $rules = [
            'title' => ['required', 'max:30'],
            'description' => ['required', 'min:5', 'max:200'],
            'album_id' => 'required'
        ];
        $messages = ['title.required' => 'ito ay  kailangan', 'description.required' => 'may laman dapat', 'min' => 'too short'];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $song = Song::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'album_id' => $request->album_id
        ]);
        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::destroy($id);
        return redirect()->back();
    }

    public function restore($id)
    {
        $song = Song::withTrashed()->where('id', $id)->restore();
        return redirect()->route('songs.index');
    }
}
