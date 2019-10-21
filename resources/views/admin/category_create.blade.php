@extends('layouts.app')
@section('content')
        <h1>Category Create Page</h1>
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" class="form-control" type="text">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection
