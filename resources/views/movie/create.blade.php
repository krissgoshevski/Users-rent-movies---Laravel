@extends('layouts.app')

@section('content')


<form action="{{ route('movie.store') }}" method="POST">
@csrf

<center>
<h3>Create Movie</h3>
<p> Name of movie: <input type="text" name="title"/> </p>

<p> 
 Type of movie: <select name="genre"  /> 
        <option value="action">Action</option>
        <option value="horror">Horror</option>
        <option value="drama">Drama</option>
        <option value="comedy">Comedy</option>
    </select> 
</p>

<p> Cost: <input type="number" name="cost" max="1000"/> </p>

<button>Create a movie</button>
</center>



</form>
@endsection