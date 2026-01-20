<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $keyword = $request->query('search');
        // dd($keyword);

        $results = DB::table('artists AS ar')
            ->join('albums AS al', 'ar.id', '=', 'al.artist_id')
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('country',  'like', '%' . $keyword . '%')
            ->orWhere('title',  'like', '%' . $keyword . '%')
            // ->toSql();
            ->paginate(10);
        // dd($results);
        // $total = DB::table('artists')->where('name', 'like', '%'.$keyword.'%')->get()->count();
        // 
        $total = $results->total();
        // dd($total);
        return view('home', compact('results', 'total'));
    }
}
