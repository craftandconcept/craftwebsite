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
      <p class="h4">Create new project</p>

      <form method="POST" class="project-form" enctype="multipart/form-data" action="{{route('projects.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" type="text">
            </div>

            <div class="form-group">
                <p class="h5">Choose category</p>
                <div class="row">
                    @foreach ($categories as $category)
                        <label class="d-flex align-items-center col-6 col-md-3">
                            <input type="checkbox" class="mr-1" name="categories[]" value="{{$category->id}}">
                            {{$category->category_name}}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="row">

                <div class="input-group mb-3 col-12 col-md-6">

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelectCountry">Country</label>
                    </div>

                    <select name="country" class="custom-select" type="text" id="inputGroupSelectCountry">
                        <option selected>Select country</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group mb-3 col-12 col-md-6">

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelectCreator">Creator</label>
                    </div>

                    <select name="creator" class="custom-select" type="text" id="inputGroupSelectCreator">
                        <option selected>Select Creator</option>
                        @foreach ($creators as $creator)
                        <option value="{{$creator->id}}">{{$creator->creator_name}}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <!-- end row -->
            <p class="h5">Choose image</p>
            <div class="multiple-files">


                <!-- Input type file for cloning begin -->
                <div class="input-group mb-3 increment clone d-none">
                    <img src="" alt="" style="height: 37px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">File</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image[0]" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <button class="btn btn-danger" type="button">Remove</button>
                </div>
                <!-- Input type file for cloning begin -->

                <!-- Input type file style -->
                <div class="input-group mb-3 increment">
                    <div class="input-group-prepend">
                        <span class="input-group-text">File</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image[]" class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>

            <!-- Input type file style -->

            <div class="text-right">
                <button class="btn btn-success add-new-file mr-1" type="button">Add Image</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

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
