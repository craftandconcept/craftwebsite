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
                </div>
            </div>

            <div class="col-12 col-md-9">
                <p class="h4">Edit collaborator</p>
                <form method="POST" enctype="multipart/form-data" class="project-form" action="{{route('collaborators.update',$collaborator->id)}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input name="name"  value="{{$collaborator->name}}" id="name" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input name="last_name"  value="{{$collaborator->last_name}}" id="last_name" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" value="{{$collaborator->title}}" id="title" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" value="{{$collaborator->description}}" class="form-control" type="text">
                    </div>


                    <p class="h5">Choose Main image</p>
                    <div class="input-group mb-3 increment">
                        <img src="{{ URL::to('/') }}/{{$collaborator->main_image}}" alt="" style="height: 37px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text">File</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="main_image" class="custom-file-input">
                            <input type="hidden" name="isset_main_image" value="{{$collaborator->main_image}}" class="form-control">
                            <label class="custom-file-label">{{$collaborator->main_image}}</label>
                        </div>
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
                            </div>

                            <button class="btn btn-danger ml-4 mb-3" type="button">Remove</button>
                        </div>
                        <!-- Input type file for cloning begin -->

                    @foreach ($collaborator->images as $i_key => $photo)
                        <!-- Input type file style -->
                            <div class="mb-3 increment">

                                <div class="increment-fields">
                                    <div class="input-wrap-flex d-flex align-items-center">
                                        <img src="{{ URL::to('/') }}/{{$photo->image->path}}" alt="" style="height: 37px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">File</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="hidden" name="photo_id[]" value="{{$photo->id}}">
                                            <input type="file" name="image[{{$i_key}}]" class="custom-file-input">
                                            <input type="hidden" name="isset_image[{{$i_key}}]" value="{{$photo->image->path}}" class="form-control">
                                            <label class="custom-file-label">{{$photo->image->path}}</label>
                                        </div>
                                        <div class="d-flex">
                                            <label for="full_image" class="ws-nowrap">Full size</label>
                                            <input type="hidden" class="custom-check-input" name="full_image[{{$i_key}}]" value="{{$photo->full}}">
                                            <input name="full11_image[{{$i_key}}]" class="custom-check-input" onclick="this.previousSibling.previousSibling.value=1-this.previousSibling.previousSibling.value" type="checkbox" value="1"
                                                   @if($photo->image->full == 1)
                                                   checked="checked"
                                                    @endif
                                            >
                                        </div>
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
