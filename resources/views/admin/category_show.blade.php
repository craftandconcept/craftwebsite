@extends('layouts.app')
@section('content')

<div class="container">

  <!-- begin row -->
  <div class="row">

    <div class="col-12 col-md-3 mb-3">
      <div class="list-group">
        <a href="{{route('projects.index')}}" class="list-group-item list-group-item-action">All projects</a>
        <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Categories</a>
      </div>
    </div>

    <div class="col-12 col-md-9">
        <p class="h4">Projects</p>
        <ul class="list-group mb-2">
          @foreach ($category->projects as $project)
            <li class="list-group-item">
                <a href="{{route('projects.edit',$category->id)}}">
                    {{$project->name}}
                </a>
            </li>
          @endforeach
        </ul>
        <div class="text-right">
          <a href="{{route('projects.create')}}" class="btn btn-primary">Create new one</a>
        </div>
    </div>

  </div>
  <!-- end row -->

</div>

@endsection