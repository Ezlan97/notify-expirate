@extends('layouts.master') @section('title','Home') @section('content')

<div class="container padding">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <img class="rounded-circle img-fluid d-block mx-auto" src="{{ asset( Auth::user()->avatar ) }}" alt="">
                    <br>                   
                    <hr>
                    <br>
                    <div class="form-group row">
                        <h6 class="col-md-4">Name  </h6>
                        <p class="col-md-6 card-text"> {{ Auth::user()->name }}</p>
                    </div>
                    <div class="form-group row">
                        <h6 class="col-md-4">Email  </h6>
                        <p class="col-md-6 card-text"> {{ Auth::user()->email }}</p>
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Update Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mb-3 border-primary">
                <div class="card-body">
                    <h5 class="card-title">Status</h5>
                    <hr>
                    <h6>New</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                    <h6>Incoming</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                    <h6>Expired</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Incoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Expired</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}

{{-- update profile  --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header">
                <h5 id="exampleModalLabel">Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" autofocus>
                            
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                        
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}">
                            
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>
                        
                        <div class="col-md-6">
                            <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">       
                        </div>
                    </div>                
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
