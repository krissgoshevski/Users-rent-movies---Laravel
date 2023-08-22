@extends('layouts.app')

@section('content')


<form action="{{ route('movie.update', $movie) }}" method="POST">
@csrf
@method('PUT')

<center>
<h3>Edit Movie</h3>
<p> Name of movie: <input type="text" name="title" value="{{ $movie->title }}"/> </p>

<p> 
 Type of movie: <select name="genre"  /> 
        <option value="action" {{ $movie->genre === 'action' ? 'checked' : '' }}>   Action </option>
        <option value="horror" {{ $movie->genre === 'horror' ? 'checked' : '' }}>   Horror </option>
        <option value="drama"  {{ $movie->genre === 'drama' ? 'checked' : '' }}>    Drama  </option>
        <option value="comedy" {{ $movie->genre === 'comedy' ? 'checked' : '' }}>   Comedy </option>
    </select> 
</p>

<p> Cost: <input type="number" name="cost" max="1000" value="{{ $movie->cost }}"/> </p>

<button>Update movie</button>
</center>



</form>
@endsection