@extends('layouts.master') @section('title','Home') @section('content')

<!-- Header -->
<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome {{ Auth::user()->name }}</div>            
        </div>
    </div>
</header>

<div class="container padding">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    @if(Auth::user()->avatar == null)
                    <img class="rounded-circle img-fluid d-block mx-auto" src="http://placehold.it/200x200" alt="">
                    @else
                    <img class="rounded-circle img-fluid d-block mx-auto" src="{{ asset( Auth::user()->avatar ) }}" alt="">
                    @endif
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateProfile">
                            Update Profile
                        </button>
                    </div>
                </div>
            </div>
            <div class="card mb-3 border-warning">
                <div class="card-body">
                    <h5 class="card-title">Status</h5>
                    <hr>
                    <h6>New</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success text-dark text-center" role="progressbar" aria-valuenow="{{ $new }}" aria-valuemin="0" aria-valuemax="{{ $all }}" style="width: @if($all == 0) 0 @else{{ $new / $all * 100 }}% @endif">{{ $new }}/{{ $all }}</div>
                    </div>
                    <h6>Incoming</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-dark text-center" role="progressbar" aria-valuenow="{{ $incoming }}" aria-valuemin="0" aria-valuemax="{{ $all }}" style="width:@if($all == 0) 0 @else{{ $incoming / $all * 100 }}% @endif">{{ $incoming }}/{{ $all }}</div>
                    </div>
                    <h6>Expired</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger text-dark text-center" role="progressbar" aria-valuenow="{{ $expired }}" aria-valuemin="0" aria-valuemax="{{ $all }}" style="width: @if($all == 0) 0 @else{{ $expired / $all * 100 }}% @endif">{{ $expired }}/{{ $all }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="card text-center border-warning">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="userProfile-tab" data-toggle="tab" href="#userProfile" role="tab" aria-controls="userProfile" aria-selected="true" style="color:black;" >New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manageMember-tab" data-toggle="tab" href="#manageMember" role="tab" aria-controls="manageMember" aria-selected="false" style="color:black;" >Incoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manageFees-tab" data-toggle="tab" href="#manageFees" role="tab" aria-controls="manageFees" aria-selected="false" style="color:black;" >Expired</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="newReminder-tab" data-toggle="tab" href="#newReminder" role="tab" aria-controls="newReminder" aria-selected="false" style="color:black;" >Add New Reminder</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="userProfile" role="tabpanel" aria-labelledby="userProfile-tab">
                            <h4 class="sm-padding text-success">New Reminder</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Reminder Date</th>
                                            <th scope="col">Expired Date</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($news as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-edit"></span>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-delete" data-toggle="modal" data-target="#deleteReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="manageMember" role="tabpanel" aria-labelledby="manageMember-tab">
                            <h4 class="sm-padding text-warning">Incoming Reminder</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Reminder Date</th>
                                            <th scope="col">Expired Date</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($incomings as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-edit"></span>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="manageFees" role="tabpanel" aria-labelledby="ManageIncome-tab">
                            <h4 class="sm-padding text-danger">Expired Reminder</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Reminder Date</th>
                                            <th scope="col">Expired Date</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expireds as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-edit"></span>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReminder{{ $reminder->id }}">
                                                    <span class="typcn typcn-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="newReminder" role="tabpanel" aria-labelledby="newReminder-tab">
                            <h4 class="sm-padding text-primary">Create New Reminder</h4>
                            <form class="form" method="POST" action="{{ route('createReminder') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="label col-md-4 col-form-label text-md-right" for="title">Title</label>
                                    <input class="input col-md-6 form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" autofocus required>
                                    @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="label col-md-4 col-form-label text-md-right" for="desc">Description</label>
                                    <textarea class="input col-md-6 form-control {{ $errors->has('desc') ? ' is-invalid' : '' }}" type="text" name="desc" required></textarea>
                                    @if ($errors->has('desc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    <label class="label col-md-4 col-form-label text-md-right" for="reminder">Reminder Date</label>
                                    <input class="input col-md-6 form-control {{ $errors->has('reminder') ? ' is-invalid' : '' }}" type="date" name="reminder" required>
                                    @if ($errors->has('reminder'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reminder') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group row">   
                                    <label class="label col-md-4 col-form-label text-md-right" for="expired">Expired</label>
                                    <input class="input col-md-6 form-control {{ $errors->has('expired') ? ' is-invalid' : '' }}" type="date" name="expired" required>
                                    @if ($errors->has('expired'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('expired') }}</strong>
                                    </span>
                                    @endif                         
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </textarea>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>

{{-- modal --}}

{{-- update profile  --}}
<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header" style="background-color: #4943FF;">
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

{{-- update reminder --}}
@foreach($reminders as $reminder)
<div class="modal fade" id="updateReminder{{ $reminder->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4943FF" >
                <h5 class="modal-title" id="exampleModalLabel">Update Your Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ route('updateReminder', $reminder->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="label col-md-4 col-form-label text-md-right" for="title">Title</label>
                        <input class="input col-md-6 form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" value="{{ $reminder->title }}" autofocus required>
                        @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="label col-md-4 col-form-label text-md-right" for="desc">Description</label>
                        <textarea class="input col-md-6 form-control {{ $errors->has('desc') ? ' is-invalid' : '' }}" type="text" name="desc" required>{{ $reminder->desc }}</textarea>
                        @if ($errors->has('desc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('desc') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label class="label col-md-4 col-form-label text-md-right" for="reminder">Reminder Date</label>
                        <input class="input col-md-6 form-control {{ $errors->has('reminder') ? ' is-invalid' : '' }}" type="date" name="reminder" value="{{ $reminder->reminder }}" required>
                        @if ($errors->has('reminder'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('reminder') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">   
                        <label class="label col-md-4 col-form-label text-md-right" for="expired">Expired</label>
                        <input class="input col-md-6 form-control {{ $errors->has('expired') ? ' is-invalid' : '' }}" type="date" name="expired" value="{{ $reminder->expired }}" required>
                        @if ($errors->has('expired'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('expired') }}</strong>
                        </span>
                        @endif                         
                    </div>
                    <div class="modal-footer text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endforeach

{{-- delete modal --}}
@foreach($reminders as $reminder)
<div class="modal fade" id="deleteReminder{{ $reminder->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Reminder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ route('deleteReminder', $reminder->id) }}" enctype="multipart/form-data">
                    @csrf
                    <h6 class="text-center">Are you sure you want to delete this reminder?</h6>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@endforeach


@endsection
