@extends('base')

@section('main')
<div class="row">
    <h1 class="display-3 col-12">Wiki stars</h1>
    <div class="new col-12">
        <a href="{{ route('profiles.create')}}" class="btn btn-primary">Add New Profile</a>
    </div>
    <tbody>
        <div class="container">
            <div class="row">
                <ul id="tabs" class="nav nav-tabs col-md-3" role="tablist">
                    @foreach($profiles as $profile)
                    <li class="nav-item">
                        <a id="tab-{{ $profile->id }}" href="#pane-{{ $profile->id }}"
                            class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" role="tab">
                            {{ $profile->first_name }} {{ $profile->last_name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div id="content" class="tab-content col-md-9" role="tablist">
                    @foreach($profiles as $profile)
                    <div id="pane-{{ $profile->id }}"
                        class="card tab-pane fade back {{ $loop->first ? 'active show' : '' }}" role="tabpanel"
                        aria-labelledby="tab-{{ $profile->id }}">
                        <div class="card-header" role="tab" id="heading-{{ $profile->id }}">
                            <h5 class="mb-0">
                                <a class="collapsed list-name" data-toggle="collapse"
                                    href="#collapse-{{ $profile->id }}" aria-expanded="false"
                                    aria-controls="collapse-{{ $profile->id }}">
                                    {{ $profile->first_name }} {{ $profile->last_name }}
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-{{ $profile->id }}" class="collapse" data-parent="#content" role="tabpanel"
                            aria-labelledby="heading-{{ $profile->id }}">
                            <img src={{$profile->image}}
                                alt="Photo of {{$profile->first_name}} {{$profile->last_name}}" />
                            <p>{{ $profile->description }}</p>
                            <div class="edit">
                                <a href="{{ route('profiles.edit',$profile->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('profiles.destroy', $profile->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                        type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </tbody>
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