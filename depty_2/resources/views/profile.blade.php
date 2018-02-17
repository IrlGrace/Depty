@extends('layouts.master')

@section('title')
    Depty-profile
@endsection

@section('content')
<script>
$(function () {
           $('.panel-google-plus > .panel-footer > .input-placeholder, .panel-google-plus > .panel-google-plus-comment > .panel-google-plus-textarea > button[type="reset"]').on('click', function(event) {
                var $panel = $(this).closest('.panel-google-plus');
                    $comment = $panel.find('.panel-google-plus-comment');
                    
                $comment.find('.btn:first-child').addClass('disabled');
                $comment.find('textarea').val('');
                
                $panel.toggleClass('panel-google-plus-show-comment');
                
                if ($panel.hasClass('panel-google-plus-show-comment')) {
                    $comment.find('textarea').focus();
                }
           });
           $('.panel-google-plus-comment > .panel-google-plus-textarea > textarea').on('keyup', function(event) {
                var $comment = $(this).closest('.panel-google-plus-comment');
                
                $comment.find('button[type="submit"]').addClass('disabled');
                if ($(this).val().length >= 1) {
                    $comment.find('button[type="submit"]').removeClass('disabled');
                }
           });
        });
</script>
   
<div class="content">
	 @include('includes.message-block')
                <div class="container-fluid">
                    <div class="row">
	                  	<div class="col-md-8">
	                  		<!--start of post-->
	                  		<!--@if($user->id==$userprofile->id)
                            <div class="card" style="height:110px; padding:10px; height:auto;">
                                
                                <form action="{{ route('post.create') }}" method="post" >
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        @if(Storage::disk('local')->has(Auth::user()->codename.'_'.Auth::user()->id.'.jpg'))
                                            <img class="img-circle img-responsive"  style="border-radius: 50px;border: 2px solid #aaa; top:18px; width: 6%; position:absolute;" src="{{route('account.image',['filename'=>Auth::user()->codename.'_'.Auth::user()->id.'.jpg'])}}" alt="...">
                                        @else
                                            <img class="img-circle img-responsive" style="border-radius: 50px;border: 2px solid #aaa; top:18px; width: 6%; position:absolute;" src="{{asset('img/user.png')}}" alt="...">
                                        @endif
                                        <textarea class="form-control pull-right" name="content" id="new-post" rows="5" id="share" placeholder="Share what you feel." style="width: 90%; margin-top: 5px; height: auto; left:100px;"></textarea>
                                        <label for="category_id"></label>
                                         	<select id="category_id" class="form-control pull-left" style="width:150px; margin-top:8px;" name="category_id">
                                            	@foreach($categories as $category)
                                            		<option value="{{$category->id}}">{{$category->categoryname}}</option>
                                            	@endforeach
                                    		</select>
                                        <button type="submit" class="btn btn-default pull-right" style="margin-top: 8px;">Post</button>
                                        <input type="hidden" value="{{ Session::token() }}" name="_token" >
                                    </div>
                                </form>
                            </div>
                            @endif-->
                            <!--start of post and comment-->
                            @foreach($posts as $post)
                            <div class="card [ panel panel-default ] panel-google-plus" style="padding:2px 10px;">
			                    <div class="panel-heading">
			            			<div class="pull-left">
				                		 @if(Storage::disk('local')->has($post->user->picture))
                                        <img class="img-circle img-responsive"  style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{route('account.image',['filename'=>$post->user->picture])}}" alt="...">
	                                    @else
	                                        <img class="img-circle img-responsive" style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{asset('img/user.png')}}" alt="...">
	                                    @endif
				                    	<p class="card-title" style="padding-left: 60px; margin-top: 5px; font-weight: bold;">{{ $post->user->codename }}</p>
				                    	<h5 style="padding-left: 60px;"">{{ $post->created_at }}</h5>
				                    </div>
				                    <div class="dropdown pull-right">
									    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"></button>
									    <div class="dropdown-menu">
									       @if($post->user== Auth::user())
	                                          <a class="dropdown-item" class="editpost_btn" data-toggle="modal" data-target="#editPostModal" data-content="{{$post->content}}" data-postid="{{$post->id}}" href="#">Edit</a>
	                                          <a class="dropdown-item" class="deletepost_btn" data-href="{{ route('post.delete',['post_id' => $post->id]) }}" data-toggle="modal" data-target="#confirm-deletepost" href="#">Delete</a>
		                                        
	                                        @else
	                                           <a class="dropdown-item" href="#">Report</a>
	                                        @endif
									    </div>
									</div>
			                    </div>
			                    <div class="panel-body">
			                        <p id="pc{{ $post->id }}">{{ $post->content }}</p>
			                    </div>
			                    <div class="panel-footer">
			                    	<a class="btn support_btn {{Auth::user()->supports()->where('post_id',$post->id)->first()? 'btn-danger' : 'btn-default'}}" data-postid="{{$post->id}}" ><i class="nc-icon nc-favourite-28 " id="support{{ $post->id }}" ></i></a>
				                    
				                    <a  class="[ btn btn-default ] talk_btn" data-postid="{{$post->id}}">
				                    	<i class="nc-icon nc-chat-round"></i>
				                    </a>
			                        <div class="input-placeholder" style="font-size: 14px;">Comment...</div>
			                    </div>
                                @if($post->supports->count()>0)
                                 <div class="panel-footer">
                                    <p id="support{{$post->id}}">{{$post->supports->count()}} Support</p>
                                </div>
                                @endif
			                    <div class="panel-google-plus-comment">
				                	 @if(Storage::disk('local')->has($user->picture))
                                        <img class="img-circle img-responsive"  style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{route('account.image',['filename'=>$user->picture])}}" alt="...">
	                                    @else
	                                        <img class="img-circle img-responsive" style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{asset('img/user.png')}}" alt="...">
	                                    @endif	
			                        <div class="panel-google-plus-textarea">
			                            <textarea rows="4"></textarea>
			                            <button type="submit" class="[ btn btn-primary disabled ]">Post comment</button>
			                            <button type="reset" class="[ btn btn-default ]">Cancel</button>
			                        </div>
			                        <div class="clearfix"></div>
			                    </div>
                                 <div class="comments panel-footer" id="comments{{$post->id}}" style="display:none;">
                                 @if($post->comments->count()>0)
                                    @foreach($post->comments as $comment)
                                    <hr />
                                     @if(Storage::disk('local')->has($comment->user->picture))
                                        <img class="img-circle pull-left"  style="border-radius: 50px; border: 2px solid #aaa; width: 50px;" src="{{route('account.image',['filename'=>$comment->user->picture])}}" alt="...">
                                        @else
                                            <img class="img-circle pull-left" style="border-radius: 50px; border: 2px solid #aaa; width: 50px;" src="{{asset('img/user.png')}}" alt="...">
                                        @endif
                                         <p>{{$comment->message}}</p>
                                         <p>{{$comment->created_at}}</p>
                                         <div class="clearfix"></div>
                                    @endforeach
                                @else
                                    <p>No Comments...</p>    
                                @endif
                                </div>
			                </div>
			                @endforeach
				        </div>
				         <div class="col-md-4">
                            <div class="card card-user">
                                <div class="card-image">
                                    
                                </div>
                                <div class="card-body">
                                    <div class="author">
                                        <a href="#">
                                            @if(Storage::disk('local')->has($userprofile->picture))
                                            <img class="avatar border-gray" src="{{route('account.image',['filename'=>$userprofile->picture])}}" alt="...">
                                            @else
                                            <img class="avatar border-gray" src="{{asset('img/user.png')}}" alt="...">
                                            @endif
                                            <h5 class="title">{{$userprofile->codename}}</h5>
                                        </a>
                                        
                                        <p class="description">
                                            Description
                                        </p>
                                    </div>
                                    @if($userinfo==null)
                                    <p class="description text-center">
                                        "Bio"
                                    </p>
                                    @else
                                    	 <p class="description text-center">
                                        {{$userinfo->description}}
                                    	</p>
                                    @endif
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

