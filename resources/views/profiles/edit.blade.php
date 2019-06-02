@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update {{$profile->first_name}} {{$profile->last_name}} profile</h1>
        <form method="post" action="{{ route('profiles.update', $profile->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                    maxlength="255" value={{ $profile->first_name }} />
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                    maxlength="255" value={{ $profile->last_name }} />
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image"
                    maxlength="255" value={{ $profile->image }} />
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                    name="description">{{ $profile->description }}
            </textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="submit">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('profiles.index')}}" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection