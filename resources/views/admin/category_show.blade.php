@extends('layouts.app')
@section('content')
        <h1>Projects</h1>
  <ul class="list-group">
@foreach ($category->projects as $project)
  <li class="list-group-item">
      <a href="{{route('projects.edit',$category->id)}}">
          Name: {{$project->name}}
      </a>
  </li>

@endforeach
  </ul>
<a href="{{route('projects.create')}}"><button type="submit">Create new one</button></a>
@endsection