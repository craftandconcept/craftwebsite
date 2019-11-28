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
      </div>
    </div>

    <div class="col-12 col-md-9">
      <p class="h4">Edit project</p>
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

            <div class="form-group">
                <label for="collaborators">Collaborators</label>
                <input name="collaborators" class="form-control" type="text" value="{{$project->collaborators}}">
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
                    <input type="text" name="creator" class="form-control" id="inputGroupCreator" value="{{$project->creators}}">

                </div>

            </div>

            <!-- end row -->

            <div class="form-group">
                <label for="function">Function</label>
                <input name="function" class="form-control" type="text" value="{{$project->function}}">
            </div>

            <div class="form-group">
                <label for="size">Size</label>
                <input name="size" class="form-control" type="text" value="{{$project->size}}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input name="status" class="form-control" type="text" value="{{$project->status}}">
            </div>

            <div class="form-group">
                <label for="photos_by">Photos by</label>
                <input name="photos_by" class="form-control" type="text" value="{{$project->photos_by}}">
            </div>

            <p class="h5">Choose Main image</p>
            <div class="input-group mb-3 increment">
                <img src="{{ URL::to('/') }}/{{$project->main_image}}" alt="" style="height: 37px;">
                <div class="input-group-prepend">
                    <span class="input-group-text">File</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="main_image" class="custom-file-input">
                    <input type="hidden" name="isset_main_image" value="{{$project->main_image}}" class="form-control">
                    <label class="custom-file-label">{{$project->main_image}}</label>
                </div>
            </div>

            <div class="form-group">
                <label for="main_text">Main Text</label>
                <input name="main_text" class="form-control" type="text" value="{{$project->main_text}}">
            </div>

            <p class="h5">Choose Additional image</p>



            <div class="multiple-files">

                <!-- Input type file for cloning begin -->
                <div class="mb-3 increment clone d-none">

                        <div class="increment-fields">
    
                            <div class="input-wrap-flex d-flex align-items-center">
    
                                <img src="" alt="" style="height: 37px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">File</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image[0]" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                                <div class="d-flex">
                                    <label for="full_image" class="ws-nowrap">Full size</label>
                                    <input type="hidden" class="custom-check-input" name="full_image[0]" value="0">
                                    <input name="full11_image[0]" class="custom-check-input" onclick="this.previousSibling.previousSibling.value=1-this.previousSibling.previousSibling.value" type="checkbox" value="1">
                                </div>
    
                            </div>
                            
                            <div class="form-group">
                                <label for="text_image">Image text</label>
                                <input name="text_image[0]" class="form-control custom-text-input" type="text" value="">
                            </div>
                        </div>
    
                        <button class="btn btn-danger ml-4 mb-3" type="button">Remove</button>
                    </div>
                <!-- Input type file for cloning begin -->

                @foreach (json_decode($project->photos) as $i_key => $photo)
                <!-- Input type file style -->
                <div class="mb-3 increment">

                    <div class="increment-fields">
                        <div class="input-wrap-flex d-flex align-items-center">
                            <img src="{{ URL::to('/') }}/{{$photo->img}}" alt="" style="height: 37px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text">File</span>
                            </div>
                            <div class="custom-file">
                            <input type="hidden" name="photo_id[]" value="{{$photo->id}}">
                                <input type="file" name="image[{{$i_key}}]" class="custom-file-input">
                                <input type="hidden" name="isset_image[{{$i_key}}]" value="{{$photo->img}}" class="form-control">
                                <label class="custom-file-label">{{$photo->img}}</label>
                            </div>
                            <div class="d-flex">
                                <label for="full_image" class="ws-nowrap">Full size</label>
                                <input type="hidden" class="custom-check-input" name="full_image[{{$i_key}}]" value="{{$photo->full}}">
                                <input name="full11_image[{{$i_key}}]" class="custom-check-input" onclick="this.previousSibling.previousSibling.value=1-this.previousSibling.previousSibling.value" type="checkbox" value="1"
                                @if($photo->full)
                                checked="checked"
                                @endif
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="text_image">Image text</label>
                            <input name="text_image[{{$i_key}}]" class="form-control custom-text-imput" type="text" value="{{$photo->text}}">
                        </div>
                    </div>

                    <button class="btn btn-danger ml-4 mb-3" type="button">Remove</button>
                </div>
                <!-- Input type file style -->
                @endforeach

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
