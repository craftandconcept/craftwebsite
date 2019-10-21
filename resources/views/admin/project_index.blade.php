@extends('layouts.app')
@section('content')
        <h1>Your projects</h1>
  <ul class="list-group">
@foreach ($projects as $project)
  <li class="list-group-item">
      <a href="projects/{{ $project->id }}">
          Name: {{$project->name}}
      </a>
      <div>
        <a href="{{route('projects.edit',$project->id)}}">
          <button class="btn btn-primary" type="submit">Edit</button>
      </a>
      <form style="display: inline" method="POST" action="{{route('projects.destroy',$project->id)}}">
        @csrf
        {{method_field('DELETE')}}        
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </div>
  </li>

@endforeach
  </ul>
  <a href="{{route('projects.create')}}"><button class="btn btn-primary" type="submit">Create new one</button></a>
  <a href="{{route('categories.index')}}"><button class="btn btn-primary" type="submit">Check Categories list</button></a>
@endsection