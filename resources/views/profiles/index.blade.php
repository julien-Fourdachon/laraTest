@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Profiles</h1>    
  <table class="table table-striped">
    <div class="new">
        <a href="{{ route('profiles.create')}}" class="btn btn-primary">New profile</a>
    </div>  
    <tbody>
        <div id="accordion">
            @foreach($profiles as $profile)
                <div class="card">
                    <div class="card-header" id="heading{{ $profile->id }}">
                        <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $profile->id }}" aria-expanded="false" aria-controls="{{ $profile->id }}">
                                {{ $profile->first_name }}  {{ $profile->last_name }}
                        </button>
                        </h5>
                  </div>
                  <div id="collapse{{ $profile->id }}" class="collapse" aria-labelledby="heading{{ $profile->id }}" data-parent="#accordion">
                    <div class="card-body">
                            {{ $profile->description }}
                    </div>
                    <div class="edit">
                            <a href="{{ route('profiles.edit',$profile->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('profiles.destroy', $profile->id)}}" method="post">
                                @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                  </div>
                </div>
                @endforeach
              </div>
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