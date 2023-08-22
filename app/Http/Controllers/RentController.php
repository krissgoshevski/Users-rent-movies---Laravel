<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class RentController extends Controller
{
    //


    // za da iznajmime eden film go prakame filmot za koj stanuva zbor
    public function rent(Movie $movie)
    {
        if($movie->rentMovie())
        {
            return redirect(route('movie.list_index'));
        }

        return 'there was an error';
    }

}
