@extends('layouts.app')
@section('content')

    <div class="container">

        <!-- begin row -->
        <div class="row">

            <div class="col-12 col-md-3 mb-3">
                <div class="list-group">
                    <a href="{{route('projects.index')}}" class="list-group-item list-group-item-action">All Projects</a>
                    <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Categories</a>
                    <a href="{{route('creators.index')}}" class="list-group-item list-group-item-action">Creators</a>
                    <a href="{{route('teams.index')}}" class="list-group-item list-group-item-action">Teams</a>
                    <a href="{{route('collaborators.index')}}" class="list-group-item list-group-item-action">Collaborators</a>
                    <a href="{{route('gallery.create')}}" class="list-group-item list-group-item-action">Gallery</a>
                </div>
            </div>

            <div class="col-12 col-md-9">

                <div class="d-flex justify-content-between mb-2 align-items-center">

                    <div>
                        <p class="h4">Your teams</p>
                    </div>

                    <a href="{{route('teams.create')}}" class="btn btn-primary">Create new one</a>

                </div>

                <table class="table table-striped t-custom">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 1px;"></th>
                        <th scope="col" style="width: 1px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td class="t-custom-td">{{$team->name}}</td>
                            <td class="t-custom-td">{{$team->last_name}}</td>
                            <td class="t-custom-td">{{$team->title}}</td>
                            <td class="t-custom-td">{{$team->description}}</td>
                            <td><a href="{{route('teams.edit',$team->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form style="display: inline" method="POST" action="{{route('teams.destroy',$team->id)}}">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <!-- end row -->
    </div>
@endsection
