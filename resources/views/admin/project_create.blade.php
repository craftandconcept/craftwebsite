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
                <input required name="name" class="form-control" value="{{ old('name') }}" type="text">
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

            <div class="form-group">
                <label for="collaborators">Collaborators</label>
                <input name="collaborators" class="form-control" type="text" value="{{ old('collaborators') }}">
            </div>

            <div class="row">

                <div class="input-group mb-3 col-12 col-md-6">

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelectCountry">Country</label>
                    </div>

                    <select required name="country" class="custom-select" type="text" id="inputGroupSelectCountry">
                        <option selected value=''>Select country</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="input-group mb-3 col-12 col-md-6">

                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelectCreator">Creator</label>
                    </div>

                    <select required name="creator" class="custom-select" type="text" id="inputGroupSelectCreator">
                        <option selected value=''>Select Creator</option>
                        @foreach ($creators as $creator)
                        <option value="{{$creator->id}}">{{$creator->creator_name}}</option>
                        @endforeach
                    </select>

                </div>

            </div>
            <!-- end row -->

            <div class="form-group">
                <label for="city">City</label>
                <input name="city" class="form-control" type="text" value="{{ old('city') }}">
            </div>

            <div class="form-group">
                <label for="main_description">Project Type</label>
                <textarea name="main_description" class="form-control" type="text"></textarea>
            </div>

            <div class="form-group">
                <label for="function">Function</label>
                <input name="function" class="form-control" type="text" value="{{ old('function') }}">
            </div>

            <div class="form-group">
                <label for="size">Size</label>
                <input name="size" class="form-control" type="text" value="{{ old('size') }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input name="status" class="form-control" type="text" value="{{ old('status') }}">
            </div>

            <div class="form-group">
                <label for="photos_by">Photos by</label>
                <input name="photos_by" class="form-control" type="text" value="{{ old('photos_by') }}">
            </div>

            <p class="h5">Choose Main image</p>
            <div class="input-group mb-3 increment">
                <div class="input-group-prepend">
                    <span class="input-group-text">Main Image</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="main_image" class="custom-file-input" >
                    <label class="custom-file-label">Choose file</label>
                </div>
            </div>

            <div class="form-group">
                <label for="main_text">Main Text</label>
                <textarea name="main_text" class="form-control" type="text"></textarea>
            </div>

            <p class="h5">Choose additional images</p>
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

                <!-- Input type file style -->
                <div class="mb-3">

                    <div class="input-wrap-flex d-flex align-items-center">

                        <div class="input-group-prepend">
                            <span class="input-group-text">File</span>
                        </div>

                        <div class="custom-file">
                            <input type="file" name="image[]" class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>

                        <div class="d-flex">
                            <label for="full_image" class="ws-nowrap" style="white-space: ">Full size</label>
                            <input type="hidden" class="custom-check-input" name="full_image[]" value="0">
                            <input name="full11_image[]" class="custom-check-input" onclick="this.previousSibling.previousSibling.value=1-this.previousSibling.previousSibling.value" type="checkbox" value="1">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="text_image">Image text</label>
                        <textarea name="text_image[]" class="form-control custom-text-input" type="text" value=""></textarea>
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
<script>
        $(document).ready(function () {
        $('.btn-primary').click(function() {
          checked = $("input[type=checkbox]:checked").length;

          if(!checked) {
            alert("You should check at least one category.");
            return false;
          }

        });
    });
    </script>

@endsection
