@extends('layouts.app')
@section('content')
        <h1>Category Edit Page</h1>
    <form method="POST" action="{{route('categories.update',$category->id)}}">
            @csrf
            {{method_field('PUT')}}    
            <label for="name">Name</label>
        <input name="name" type="text" value="{{$category->category_name}}">
            <button type="submit">Update</button>
        </form>

