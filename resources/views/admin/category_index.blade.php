@extends('layouts.app')
@section('content')
        <h1>Your categories</h1>
  <ul class="list-group">
@foreach ($categories as $category)
  <li class="list-group-item" >
      <a href="categories/{{ $category->id }}">
          Name: {{$category->category_name}}
      </a>
      <div>
        <a href="{{route('categories.edit',$category->id)}}">
          <button class="btn btn-primary" type="submit">Edit</button>
      </a>
      <form style="display: inline" method="POST" action="{{route('categories.destroy',$category->id)}}">
        @csrf
        {{method_field('DELETE')}}        
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </div>
  </li>

@endforeach
  </ul>
  <a href="{{route('categories.create')}}"><button class="btn btn-primary" type="submit">Create new one</button></a>
  <a href="{{route('projects.index')}}"><button class="btn btn-primary" type="submit">Check Project list</button></a>
@endsection