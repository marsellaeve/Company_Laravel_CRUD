<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('filtergenre')){
            $data_film = \App\Models\Film::whereHas('genre', function($q)use($request) {
                $q->where('name', '=', $request->filtergenre);
            })->paginate(4);

        }
        else{
            $data_film=\App\Models\Film::paginate(4);
        }
        $genre_film=\App\Models\Genre::all();
        return view('dashboards.index',['genre_film'=>$genre_film,'data_film'=>$data_film]);
    }
}
