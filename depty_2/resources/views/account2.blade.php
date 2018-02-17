@extends('layouts.master')

@section('title')
    Depty-account
@endsection

@section('content')
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default"  style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingOne">  
                                                <div class="title" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                    <strong>Name:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-6 pr-1">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="First Name" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 pl-1">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Last Name" value="">
                                                                </div>
                                                            </div>
                                                             <div class="pull-right">
                                                                <button type="submit" class="btn btn-info btn-fill">Save</button>
                                                            </div> 
                                                        </div>  
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default" style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingTwo"> 
                                                <div class="title collapsed" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <strong>Email Address:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" disabled="" placeholder="Email Address" value="firstname@blank.com">
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </form>    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default" style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingfour"> 
                                                <div class="title collapsed" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                                    <strong>Location:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <select class="form-control">
                                                                        <option>Philippines</option>
                                                                        <option>United States</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </form>    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default" style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingfour"> 
                                                <div class="title collapsed" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                                    <strong>About me:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </form>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    </br>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-info btn-fill">Save Changes</button>
                                        <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                                    </div>     
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Codename</h4>
                                </div>
                                <div class="card-body">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default" style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingThree"> 
                                                <div class="title collapsed" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    <strong>Codename:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" placeholder="Codename" value="">
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    </form>    
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-info btn-fill">Save Changes</button>
                                        <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                                    </div>    
                                </div>
                            </div>        

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default" style="border-bottom:1px solid #eee;">
                                            <div class="panel-heading" role="tab" id="headingSix">  
                                                <div class="title" data-role="title" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                    <strong>Password:</strong>
                                                    <button type="button" class="btn btn-link pull-right">Edit</button>
                                                </div>
                                            </div>
                                            <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
                                                <div class="panel-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-md-4 pr-1">
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" placeholder="Old Password" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 px-1">
                                                                <div class="form-group">
                                                                    <input type="New Password" class="form-control" placeholder="New password" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 pl-1">
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control" placeholder="Confirm New Password">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                </br>
                                                <button type="submit" class="btn btn-info btn-fill">Save Changes</button>
                                                <button type="submit" class="btn btn-info btn-fill">Cancel</button>
                                            </div>    
                                        </div>    
                                    </div>
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
                                            <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                                            <h5 class="title">Name</h5>
                                        </a>
                                        <p class="description">
                                            Email Address
                                        </p>
                                    </div>
                                    <p class="description text-center">
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
