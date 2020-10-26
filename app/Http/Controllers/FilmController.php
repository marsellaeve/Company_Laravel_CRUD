<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_film = \App\Models\Film::where('title','LIKE','%'.$request->search.'%')->sortable();
        }
        else if($request->has('filterdate')){
            $data_film = \App\Models\Film::where('release_date','<',$request->filterdate)->sortable();
        }
        else if($request->has('filterrated')){
            $data_film = \App\Models\Film::where('rated','=',$request->filterrated)->sortable();
        }
        else if($request->has('filterrating')){
            $data_film = \App\Models\Film::where('rating','>',$request->filterrating)->sortable();
        }
        else{
            $data_film = \App\Models\Film::sortable();
        }
        $genre_film=\App\Models\Genre::all();
        return view('film.index',['data_film'=>$data_film->paginate(10),'genre_film'=>$genre_film]);
    }
    public function create(Request $request)
    {
        $film = \App\Models\Film::create($request->all());
        if($request->hasFile('poster')){
            $request->file('poster')->move('images/',$request->file('poster')->getClientOriginalName());
            $film->poster=$request->file('poster')->getClientOriginalName();
            $film->save();
        }
        
        $film->genre()->attach($request->genre);
        return redirect('/film')->with('success','Film Input Success');
    }
    public function edit($id)
    {
        $film = \App\Models\Film::find($id);
        return view('film/edit',['film'=>$film]);
    }
    public function update(Request $request,$id)
    {
        $film = \App\Models\Film::find($id);
        $film->update($request->all());
        if($request->hasFile('poster')){
            $request->file('poster')->move('images/',$request->file('poster')->getClientOriginalName());
            $film->poster=$request->file('poster')->getClientOriginalName();
            $film->save();
        }
        return redirect('/film')->with('success','Film Update Success');
    }
    public function delete($id)
    {
        $film = \App\Models\Film::find($id);
        $film->delete($film);
        return redirect('/film')->with('success','Film Delete Success');
    }
    public function detail($id)
    {
        $film = \App\Models\Film::find($id);
        return view('film.detail',['film'=>$film]);
    }
}
