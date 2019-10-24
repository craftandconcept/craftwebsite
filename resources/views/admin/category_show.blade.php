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

      <div class="d-flex justify-content-between mb-2 align-items-center">
        <p class="h4">{{$category->category_name}} Projects</p>

        <a href="{{route('projects.create')}}" class="btn btn-primary">Create new one</a>
      </div>

      <table class="table table-striped t-custom">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col" style="width: 1px;"></th>
              <th scope="col" style="width: 1px;"></th>
            </tr>
          </thead>
          <tbody>
           @if($category->projects->isEmpty())

            <tr>
              <td>There are no projects in this category yet</td>
              <td></td>
              <td></td>
            </tr>

           @else
           @foreach ($category->projects as $project)
            <tr>
              <td class="t-custom-td">{{$project->name}}</td>
              <td><a href="{{route('projects.edit',$project->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                <form style="display: inline" method="POST" action="{{route('projects.destroy',$project->id)}}">
                  @csrf
                  {{method_field('DELETE')}}
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
           @endif

          </tbody>
        </table>
    </div>

  </div>
  <!-- end row -->

</div>

@endsection
