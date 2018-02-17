@extends('layouts.master')

@section('title')
    Depty-account
@endsection

@section('content')
<div class="content">
     @include('includes.message-account');
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Information</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('account.save') }}" method="post">
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ $userinfo ==null? '' : $userinfo->firstname }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{ $userinfo ==null? '' : $userinfo->lastname }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Birthdate</label>
                                                    <input type="date" class="form-control" name="birthdate" value="{{ $userinfo ==null? '' : $userinfo->birthdate }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Expert in Mental Illness and Awareness</label>
                                                    <select name="expert" class="form-control">
                                                        <option value="0">No</option>
                                                        <option value="1">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <select name="location" class="form-control">
                                                        <option>United States</option>
                                                        <option>Philippines</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About me</label>
                                                    <textarea class="form-control" placeholder="Description" name="description" >{{ $userinfo ==null? '' : $userinfo->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                         <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                        <div class="clearfix"></div>
                                    </form>
                                   
                                    
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Codename</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="{{route('account.updatecodename')}}" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('codename') ? ' has-error' : '' }}">
                                                    <label for="codename" class="control-label">Codename</label>
                                                    <input type="text" class="form-control" placeholder="Codename" name="codename" value="{{Auth::user()->codename}}">
                                                     @if ($errors->has('codename'))
                                                        <p class="text-danger">{{ $errors->first('codename') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Change Codename</button>
                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                        <div class="clearfix"></div>
                                    </form>
                                   
                                    
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <form action="{{route('account.updatepassword')}}" method="post">
                                        <div class="row">
                                            <div class="col-md-4 pr-1">
                                                <div class="form-group {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                    <label for="old_password" class="control-label">Old Password</label>
                                                    <input type="password" class="form-control" placeholder="Old Password" name="old_password" value="">
                                                    @if ($errors->has('old_password'))
                                                        <p class="text-danger">{{ $errors->first('old_password') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group {{ $errors->has('new_password') ? ' has-error' : '' }}">
                                                    <label for="new_password" class="control-label">New Password</label>
                                                    <input type="password" class="form-control" placeholder="New password" name="new_password" value="">
                                                    @if ($errors->has('new_password'))
                                                        <p class="text-danger">{{ $errors->first('new_password') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group {{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                                                    <label for="confirm_password" class="control-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_password">
                                                    @if ($errors->has('confirm_password'))
                                                        <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Change Password</button>
                                        <input type="hidden" value="{{Session::token()}}" name="_token" />
                                       
                                    </form>
                                   
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            @if(Storage::disk('local')->has($user->picture))
                                            <img class="avatar border-gray" src="{{route('account.image',['filename'=>$user->picture])}}" alt="...">
                                            @else
                                            <img class="avatar border-gray" src="{{asset('img/user.png')}}" alt="...">
                                            @endif
                                            <h5 class="title">{{$user->codename}}</h5>
                                        </a>
                                        <form action="{{ route('account.updateimage') }}" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="file" name="displayphoto" class="form-control" id="displayphoto" />
                                            </div>
                                            <button type="submit" class="btn btn-primary">Change Profile Photo</button>
                                            <input type="hidden" value="{{Session::token()}}" name="_token" />
                                        </form>
                                        <p class="description">
                                            Description
                                        </p>
                                    </div>
                                    <p class="description text-center">
                                        "Bio"
                                    </p>
                                </div>
                                <hr>
                                <div class="button-container mr-auto ml-auto">
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button href="#" class="btn btn-simple btn-link btn-icon">
                                        <i class="fa fa-google-plus-square"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
@endsection