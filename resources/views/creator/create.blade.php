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
                <p class="h4">Create new creators</p>

                <form method="POST" class="project-form" enctype="multipart/form-data" action="{{route('creators.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="creator_name">First Name</label>
                        <input required name="creator_name" id="creator_name" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="creator_last_name">Last Name</label>
                        <input name="creator_last_name" id="creator_last_name" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="creator_title">Title</label>
                        <input name="creator_title"  id="creator_title" class="form-control" type="text">
                    </div>

                    <div class="form-group">
                        <label for="creator_description">Description</label>
                        <input name="creator_description" class="form-control" type="text">
                    </div>

                    <p class="h5">Choose Main image</p>
                    <div class="input-group mb-3 increment">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Main Image</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="creator_main_image" required class="custom-file-input">
                            <label class="custom-file-label">Choose file</label>
                        </div>
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
