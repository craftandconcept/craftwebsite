@extends('layouts.app')
@section('content')
    <h1>Project Page</h1>
    <div>
        <label for="">Name</label>: <p>{{$project->name}}</p>
    </div>
@endsection