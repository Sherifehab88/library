@extends('layout')

@section('title')
Sherifitch

@endsection

@section('content')



<h1>Book ID is {{$book->id}}</h1>
<h3>{{$book->title}}</h3>
<p>{{$book->desc}}</p>

<h4>categories:</h4>
<ul>
@foreach ($book->categories as $category )
<li>{{$category->name}}</li>
@endforeach
</ul>

<hr>
<a href="{{ route('books.index') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>


@endsection