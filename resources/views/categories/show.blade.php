@extends('layout')

@section('title')
category {{$category->name}}

@endsection

@section('content')



<h1>category ID {{$category->id}}</h1>
<h3>{{$category->name}}</h3>
<h4>Books:</h4>
<ul>
@foreach ($category->books as $book)
<li>{{$book->title}}</li>
@endforeach
</ul>


<hr>
<a href="{{ route('categories.index') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>


@endsection