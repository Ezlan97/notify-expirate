@extends('layouts.master') @section('title','Home') @section('content')

<div class="container padding">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
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
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success text-dark text-center" role="progressbar" aria-valuenow="{{ $reminders->where('reminder', '>', date("Y-m-d"))->count() }}" aria-valuemin="0" aria-valuemax="{{ $reminders->count() }}" style="width: {{ $reminders->where('reminder', '>', date("Y-m-d") and 'expired', '>', date("Y-m-d"))->count() / $reminders->count() * 100 }}%">{{ $reminders->where('reminder', '>', date("Y-m-d") and 'expired', '>', date("Y-m-d"))->count() }}/{{ $reminders->count() }}</div>
                    </div>
                    <h6>Incoming</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning text-dark text-center" role="progressbar" aria-valuenow="{{ $reminders->where('reminder', '<', date("Y-m-d"))->count() }}" aria-valuemin="0" aria-valuemax="{{ $reminders->count() }}" style="width: {{ $reminders->where('reminder', '<', date("Y-m-d"))->count() / $reminders->count() * 100 }}%">{{ $reminders->where('reminder', '<', date("Y-m-d"))->count() }}/{{ $reminders->count() }}</div>
                    </div>
                    <h6>Expired</h6>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger text-dark text-center" role="progressbar" aria-valuenow="{{ $reminders->where('expired', '>', date("Y-m-d"))->count() }}" aria-valuemin="0" aria-valuemax="{{ $reminders->count() }}" style="width: {{ $reminders->where('expired', '>', date("Y-m-d"))->count() / $reminders->count() * 100 }}%">{{ $reminders->where('expired', '>', date("Y-m-d"))->count() }}/{{ $reminders->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-9">
            <div class="card text-center border-primary">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="userProfile-tab" data-toggle="tab" href="#userProfile" role="tab" aria-controls="userProfile" aria-selected="true">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manageMember-tab" data-toggle="tab" href="#manageMember" role="tab" aria-controls="manageMember" aria-selected="false">Incoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manageFees-tab" data-toggle="tab" href="#manageFees" role="tab" aria-controls="manageFees" aria-selected="false">Expired</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="newReminder-tab" data-toggle="tab" href="#newReminder" role="tab" aria-controls="newReminder" aria-selected="false">Add New Reminder</a>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reminders->where('reminder', '>', date("Y-m-d") and 'expired', '>', date("Y-m-d")) as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reminders->where('reminder', '<', date("Y-m-d")) as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reminders->where('expired', '>', date("Y-m-d")) as $reminder)
                                        <tr>
                                            <th>{{ $reminder->title }}</th>
                                            <td>{{ $reminder->desc }}</td>
                                            <td>{{ $reminder->reminder }}</td>
                                            <td>{{ $reminder->expired }}</td>
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
