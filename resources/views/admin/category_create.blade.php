@extends('layouts.app')
@section('content')
<<<<<<< HEAD

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
        <p class="h4">Create Category</p>
=======
        <h1>Category Create Page</h1>
>>>>>>> dev
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" type="text">
            </div>
<<<<<<< HEAD
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
=======
            <button type="submit" class="btn btn-primary">Submit</button>
            @if($errors->any())
        {{implode (' ', $errors->all(':message'))}}
        @endif
        </form>
>>>>>>> dev
@endsection
