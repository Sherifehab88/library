@extends('layout')

@section('title')
categories

@endsection

@section('content')



<h1>All categories</h1>
<a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Create category</a>
@foreach ($categories as $category )

<hr>
<a href="{{ route('categories.show', $category->id) }}">
<h3>{{$category->name}}</h3>
</a>
@auth
<a href="{{ route('categories.edit',$category->id) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Edit</a>
<a href="{{ route('categories.delete',$category->id) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Delete</a>
@endauth
@endforeach


{!! $categories->render() !!}

@endsection