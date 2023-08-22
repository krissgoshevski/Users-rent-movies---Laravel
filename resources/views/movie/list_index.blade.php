@extends('layouts.app')

@section('content')
<div style="margin-left: 50px;">
    <h3>List page for Movies</h3>
    <br>
    <h3>All Movies</h3>
</div>

<table style="border-collapse: collapse; width: 60%; margin-left: 50px;" border="1">
    <thead>
        <tr>
            <th style="border: 1px solid black;">ID</th>
            <th style="border: 1px solid black;">Title</th>
            <th style="border: 1px solid black;">Genre</th>
            <th style="border: 1px solid black;">Cost</th>
            <th style="border: 1px solid black;">Availability</th>
            <!-- dokolku userot  e logiran i dokolku userot e admin -->
            @if (Auth::user()->isAdmin())
            <th style="border: 1px solid black;">Action</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach ($movies as $movie)
        <tr>
            <td style="border: 1px solid black;">{{ $movie->id }}</td>
            <td style="border: 1px solid black;">{{ $movie->title }}</td>
            <td style="border: 1px solid black;">{{ $movie->genre }}</td>
            <td style="border: 1px solid black;">{{ $movie->cost }}</td>
            <td style="border: 1px solid black;">
            @if($movie->isAvailableMovie())
                <form method="POST" action="{{ route('movie.rent', $movie) }}">
                    @csrf
                    <button type="submit">Rent</button>
                </form>
                @else
                <p>Not available</p>
            @endif
            </td>

            @if (Auth::user()->isAdmin())
            <td> 
                <a href="{{ route('movie.edit', $movie) }}"> Edit </a> 
                <form action="{{ route('movie.destroy', $movie) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"> Delete </button>
                </form>    
            </td>
            @endif

        </tr>
        @endforeach
    </tbody>
</table>
@endsection
















