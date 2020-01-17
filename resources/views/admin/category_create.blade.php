@extends('layouts.app')
@section('content')

<div class="container">

  <!-- begin row -->
  <div class="row">

    <div class="col-12 col-md-3 mb-3">
      <div class="list-group">
        <a href="{{route('projects.index')}}" class="list-group-item list-group-item-action">All projects</a>
        <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Categories</a>
        <a href="{{route('creators.index')}}" class="list-group-item list-group-item-action">Creators</a>
        <a href="{{route('teams.index')}}" class="list-group-item list-group-item-action">Teams</a>
        <a href="{{route('collaborators.index')}}" class="list-group-item list-group-item-action">Collaborators</a>
          <a href="{{route('gallery.create')}}" class="list-group-item list-group-item-action">Gallery</a>
      </div>
    </div>

    <div class="col-12 col-md-9">
        <p class="h4">Create Category</p>
        <form method="POST" enctype="multipart/form-data" action="{{route('categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" type="text">
            </div>
            <p class="h5">Choose image</p>
            <div class="input-group mb-3 increment">
                <div class="input-group-prepend">
                    <span class="input-group-text">Image</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="main_image" class="custom-file-input">
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            @if($errors->any())
                <div class="alert alert-danger mt-2" role="alert">
                    {{implode (' ', $errors->all(':message'))}}
                </div>
            @endif
        </form>
    </div>

  </div>
  <!-- end row -->

</div>
@endsection
