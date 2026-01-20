<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listener;
use App\Models\Album;
use DB;
use Illuminate\Support\Facades\Auth;

class ListenerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeners = Listener::withTrashed()->get();
        return view('listener.index', compact('listeners'));
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
        Listener::destroy($id);
        return redirect()->route('listeners.index');
    }

    public function restore($id)
    {
        $listener = Listener::withTrashed()->find($id)->restore();
        // dd($listener);
        // $listener->restore();

        return redirect()->route('listeners.index');
    }

    public function addAlbums()
    {
        // $albums = Album::all();
        $albums = DB::table('albums')
            ->join('artists', 'artists.id', '=', 'albums.artist_id')
            ->get(['name', 'albums.id', 'title', 'genre', 'date_released']);
        // dd($albums);

        return view('listener.add_album', compact('albums'));
    }

    public function addAlbumListener(Request $request)
    {
        // dd(Auth::id());
        // $listener_id = 1;
        $listener = Listener::where('user_id', Auth::id())->first();
        // dd($request->album_id);
        foreach ($request->album_id as $album_id) {
            // dump($album_id);
            DB::table('album_listener')->insert([
                'album_id' => $album_id,
                'listener_id' => $listener->id,
                'created_at' => now()
            ]);
        }
        return redirect()->route('listeners.index');
    }

    public function editAlbumListener()
    {
        $myAlbums = DB::table('album_listener')->where('listener_id', Auth::id())->get()->pluck('album_id')->all();
        // dd($myAlbums);
        $albums = Album::all();
        // dd($albums);

        return view('listener.edit_album', compact('myAlbums', 'albums'));
    }

    public function updateAlbums(Request $request)
    {
        // dd($request->album_id);
        $listener = Listener::where('user_id', Auth::id())->select('id')->first();
        // dd($listener->id);
        DB::table('album_listener')->where('listener_id', $listener->id)->delete();
        if (!empty($request->album_id)) {
            foreach ($request->album_id as $album_id) {
                DB::table('album_listener')->insert([
                    'album_id' => $album_id,
                    'listener_id' => $listener->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('listeners.editAlbumListener')->with('success', 'albums updated');
    }
}
