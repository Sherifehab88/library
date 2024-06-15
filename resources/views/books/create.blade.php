@extends('layout')

@section('title')
create Book
@endsection

@section('content')

@include('inc.errors')

<form method="POST" action="{{Route('books.store')}}" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <input type="text" name='title' class="form-control" placeholder="title" value="{{old('title')}}">
  </div>
  
  
  <div class="form-group">
    <textarea class="form-control" name="desc" rows="3" placeholder="description">{{old('desc')}}</textarea>
  </div>

  <div class="form-group">
   
    <input class="form-control-file" type="file" name="img" >
  </div>
  

  

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection