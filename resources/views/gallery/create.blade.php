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
                <p class="h4">Create new gallery</p>

                <form method="POST" class="project-form" enctype="multipart/form-data" action="{{route('gallery.store')}}">
                    @csrf
                    <div id="1">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input required name="gallery[1][image]" id="image" class="form-control" type="file">
                        </div>
                        <div class="form-group">
                            <label for="sort">Sort</label>
                            <input name="gallery[1][sort]" id="sort" class="form-control" type="number">
                        </div>

                        <div class="form-group">
                            <label for="time">Time</label>
                            <input name="gallery[1][time]"  id="time" class="form-control" type="number">
                        </div>
                        <!-- Input type file style -->
                    </div>
                        <div class="text-right">
                            <button class="btn btn-success add-new-file mr-1" id="add-image" type="button">Add Image</button>
                            <button class="btn btn-success add-new-file mr-1" id="add-link"type="button">Add video link</button>
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
    <script type="application/javascript">
        var counter = 1;

        $('.add-new-file').on('click', function () {
            if($(this).attr('id') === 'add-image') {
                counter++;
                $('form').append('    <div id='+ counter +'>\n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="image">Image</label>\n' +
                    '                            <input required name="gallery['+ counter +'][image]" id="image" class="form-control" type="file">\n' +
                    '                        </div>\n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="sort">Sort</label>\n' +
                    '                            <input name="gallery['+ counter +'][sort]" id="sort" class="form-control" type="number">\n' +
                    '                        </div>\n' +
                    '    \n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="time">Time</label>\n' +
                    '                            <input name="gallery['+ counter +'][time]"  id="time" class="form-control" type="number">\n' +
                    '                        </div>\n' +
                    '    \n' +
                    '                        <div class="form-group">\n' +
                    '                            <button type="button" class="btn btn-danger remove-block" data-block='+ counter +'>delete</button>\n' +
                    '                        </div>\n' +
                    '                    </div>')
            }
            if($(this).attr('id') === 'add-link') {
                counter++;
                $('form').append('    <div id='+ counter +'>\n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="image">Link Video</label>\n' +
                    '                            <input required name="gallery['+ counter +'][link]" id="image" class="form-control" type="text">\n' +
                    '                        </div>\n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="sort">Sort</label>\n' +
                    '                            <input name="gallery['+ counter +'][sort]" id="sort" class="form-control" type="number">\n' +
                    '                        </div>\n' +
                    '    \n' +
                    '                        <div class="form-group">\n' +
                    '                            <label for="time">Time</label>\n' +
                    '                            <input name="gallery['+ counter +'][time]"  id="time" class="form-control" type="number">\n' +
                    '                        </div>\n' +
                    '    \n' +
                    '                        <div class="form-group">\n' +
                    '                            <button type="button" class="btn btn-danger remove-block" data-block='+ counter +'>delete</button>\n' +
                    '                        </div>\n' +
                    '                    </div>')
            }
        });

        $(document).delegate('.remove-block', 'click', function () {
            let id = $(this).attr('data-block');
            $('#' + id).remove();
        })
    </script>
@endsection
