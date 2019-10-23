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
      <p class="h4">Edit project</p>
      {{ $project }}
      <form method="POST" enctype="multipart/form-data" class="project-form" action="{{route('projects.update',$project->id)}}">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">Name</label>
            <input name="name" type="text" class="form-control" value="{{$project->name}}">
            </div>

            <div class="form-group">
                <p class="h5">Choose category</p>
                <div class="row">
                    @foreach ($categories as $category)
                    <label class="d-flex align-items-center col-6 col-md-3">
                        <input type="checkbox" class="mr-1" name="categories[]" value="{{$category->id}}"
                        @if($project->categories->where('id',$category->id)->count())
                        checked="checked"
                        @endif
                        >
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

                    <select name="country" class="custom-select" type="text">
                        <option value="">Please select</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}"
                        @if($project->country_id == $country->id)
                        selected="selected"
                        @endif
                            >{{$country->country_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group mb-3 col-12 col-md-6">

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelectCreator">Creator</label>
                    </div>

                    <select name="creator" class="custom-select" type="text">
                        <option value="">Please select</option>
                        @foreach ($creators as $creator)
                        <option value="{{$creator->id}}"
                        @if($project->creator_id == $creator->id)
                        selected="selected"
                        @endif
                            >{{$creator->creator_name}}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <!-- end row -->
            <p class="h5">Choose image</p>



            <div class="multiple-files">
                @foreach (json_decode($project->image) as $image)

                <!-- Input type file style -->
                <div class="input-group mb-3 increment">
                    <img src="{{ URL::to('/') }}/images/project{{$project->id}}/{{$image}}" alt="" style="height: 37px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text">File</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image[]" required="false" class="custom-file-input">
                        <label class="custom-file-label">{{$image}}</label>
                    </div>
                    <button class="btn btn-danger" type="button">Remove</button>
                </div>
                @endforeach
            </div>

            <!-- Input type file style -->

            <div class="text-right">
                <button class="btn btn-success add-new-file mr-1" type="button">Add Image</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
