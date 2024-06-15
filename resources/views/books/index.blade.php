@extends('layout')

@section('title')
Sherifitch

@endsection

@section('content')



<h1>All Books</h1>
<a href="{{ route('books.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create Book</a>
@foreach ($books as $book )

<hr>
<img src="{{asset('uploads/books/'.$book->img)}}" alt="{{ $book->name }}" class="img-thumbnail">
<a href="{{ route('books.show', $book->id) }}">
<h3>{{$book->title}}</h3>
</a>
<p>{{$book->desc}}</p>
@auth
<a href="{{ route('books.edit',$book->id) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Edit</a>
<a href="{{ route('books.delete',$book->id) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Delete</a>
@endauth
@endforeach


{!! $books->render() !!}

@endsection