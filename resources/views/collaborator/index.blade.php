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
                </div>
            </div>

            <div class="col-12 col-md-9">

                <div class="d-flex justify-content-between mb-2 align-items-center">

                    <div>
                        <p class="h4">Your collaborators</p>
                    </div>

                    <a href="{{route('collaborators.create')}}" class="btn btn-primary">Create new one</a>

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
                    @foreach ($collaborators as $collaborator)
                        <tr>
                            <td class="t-custom-td">{{$collaborator->name}}</td>
                            <td class="t-custom-td">{{$collaborator->last_name}}</td>
                            <td class="t-custom-td">{{$collaborator->title}}</td>
                            <td class="t-custom-td">{{$collaborator->description}}</td>
                            <td><a href="{{route('collaborators.edit',$collaborator->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <form style="display: inline" method="POST" action="{{route('collaborators.destroy',$collaborator->id)}}">
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
