<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
    //

    public function create()
    {
        return view('movie.create');
    }

    public function store(MovieRequest $req)
    {
            $data = $req->validated();
            Movie::create($data);
            return redirect(route('movie.list_index'));
    }

   

    public function list()
    {
      //  $movies = Movie::all(); // Retrieve all movies from the database
     //   return view('movie.list_index', compact('movies')); // Pass movies to the view

     // isto e 

        return view('movie.list_index', ['movies' => Movie::all()]);
    }


   // @param \App\Models\Movie $movie
    public function edit(Movie $movie)
    {
        return view('movie.edit', ['movie' => $movie]);
    }

    public function update(MovieRequest $movieReq, Movie $movie)
    {
        $data = $movieReq->validated();
        $movie->update($data);

        return redirect(route('movie.list_index'));

    }


    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect(route('movie.list_index'));
    }


    
    // public function destroy($movie)
    // {
    //     // Logic to delete the movie with the given ID
    //     Movie::findOrFail($movie)->delete();
    //     return redirect()->route('movie.list_index')->with('success', 'Movie deleted successfully');
    // }

    // same way 


    

}
