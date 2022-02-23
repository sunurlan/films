<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Poster;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('name', 'id');
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(Film::$rules);
        $film = Film::create($request->all());
        $film->saveGenres($request->input('genres'));
        $film->savePoster($request->file('poster'));

        return redirect()->route('films.index')->with('success','Запись успешно создана.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $genres = Genre::pluck('name', 'id');
        $statusNames = Film::$statusNames;
        return view('films.edit', compact('film', 'genres', 'statusNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {   
        $request->validate(Film::$rules);
        $film->update($request->all());
        $film->saveGenres($request->input('genres'), $film);
        $film->savePoster($request->file('poster'));

        return redirect()->route('films.index')->with('success','Запись успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {   
        $film->genres()->detach();
        $film->delete();
        
        return redirect()->route('films.index')->with('success','Запись успешно удалена');
    }
}
