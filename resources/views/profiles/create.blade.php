@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a profile</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('profiles.store') }}">
        @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" {{ $errors->has('first_name') ? 'is-invalid' : '' }}  placeholder="Votre nom"/>
              {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>

          <div class="form-group">
              <label for="image">Image:</label>
              <input type="text" class="form-control" name="image"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>                        
          <button type="submit" class="btn btn-primary-outline">Add profile</button>
      </form>
  </div>
</div>
</div>
@endsection