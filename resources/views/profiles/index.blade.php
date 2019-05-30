@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Profiles</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Image</td>
          <td>Description</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <div>
        <a style="margin: 19px;" href="{{ route('profiles.create')}}" class="btn btn-primary">New profile</a>
    </div>  
    <tbody>
        @foreach($profiles as $profile)
        <tr>
            <td>{{$profile->id}}</td>
            <td>{{$profile->first_name}} {{$profile->last_name}}</td>
            <td><img src={{$profile->image}} alt="Photo of {{$profile->first_name}} {{$profile->last_name}}" width="200 px" heigth="314 px"/></td>
            <td>{{$profile->description}}</td>
            <td>
                <a href="{{ route('profiles.edit',$profile->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('profiles.destroy', $profile->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
    <div class="col-sm-12">
        @if(session()->get('success'))
            <div class="alert alert-success">
            {{ session()->get('success') }}  
            </div>
        @endif
    </div>
</div>
@endsection