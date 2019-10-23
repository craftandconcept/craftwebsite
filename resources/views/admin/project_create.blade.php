@extends('layouts.app')
@section('content')
        <h1>Project Create Page</h1>
        <form method="POST" enctype="multipart/form-data" action="{{route('projects.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                @foreach ($categories as $category)
            <input type="checkbox" name="categories[]" value="{{$category->id}}">
            <label for="">{{$category->category_name}}</label>
                @endforeach
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country" type="text">
                    <option value="">Please select</option>
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="creator">Creator</label>
                <select name="creator" type="text">
                    <option value="">Please select</option>
                    @foreach ($creators as $creator)
                    <option value="{{$creator->id}}">{{$creator->creator_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group control-group increment" >
                    <label for="file">File</label>
                    <input type="file" name="image[]" class="form-control">
                    <div class="input-group-btn"> 
                      <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                  </div>
                  <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                      <input type="file" name="image[]" class="form-control">
                      <div class="input-group-btn"> 
                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                      </div>
                    </div>
                  </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        @if($errors->any())
        {{implode (' ', $errors->all(':message'))}}
        @endif
<script type="text/javascript">

    $(document).ready(function() {

        $(".btn-success").click(function(){ 
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click",".btn-danger",function(){ 
            $(this).parents(".control-group").remove();
        });

    });

</script>
        @endsection
