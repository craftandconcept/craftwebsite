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

        <p class="h4">Project</p>

        <ul class="list-group">
          <li class="list-group-item">{{$project->name}}</li>
        </ul>

    </div>

  </div>
  <!-- end row -->
</div>

@endsection