@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a profile</h1>
  <div>
      <form method="post" action="{{ route('profiles.store') }}">
        @csrf
          <div class="form-group">    
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"/>
                @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"/>
              @error('last_name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>

          <div class="form-group">
              <label for="image">Image:</label>
              <input type="text" class="form-control  @error('image') is-invalid @enderror"  name="image"/>
              @error('image')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
              @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          </div>                        
          <button type="submit" class="btn btn-primary">Add profile</button>
      </form>
  </div>
</div>
</div>
@endsection