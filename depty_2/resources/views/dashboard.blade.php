@extends('layouts.master')

@section('title')
    Depty
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
                                                  @isset($categoryid)
                                                    <option value="{{$category->id}}" {{$categoryid==$category->id ? 'selected' : '' }}>{{$category->categoryname}}</option>
                                                  @endisset 
                                                  @empty($categoryid)
                                                    <option value="{{$category->id}}">{{$category->categoryname}}</option>
                                                  @endempty   
                                                @endforeach
                                            </select>
                                        <button type="submit" class="btn btn-default pull-right" style="margin-top: 8px;">Post</button>
                                        <input type="hidden" value="{{ Session::token() }}" name="_token" >
                                    </div>
                                </form>
                            </div><!--end of post-->

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
                                        <a href="{{route('profile',['user_id' =>$post->user->id])}}"><p class="card-title" style="padding-left: 60px; margin-top: 5px; font-weight: bold;">{{ $post->user->codename }}</p></a>
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
                                    <a class="btn support_btn {{Auth::user()->supports()->where('post_id',$post->id)->first()? 'btn-danger' : 'btn-default'}}" data-postid="{{$post->id}}" ><i class="nc-icon nc-favourite-28 " ></i></a>
                                    
                                    <a class="[ btn btn-default ] talk_btn" data-postid="{{$post->id}}" href="#">
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
                                    

                                     @if(Storage::disk('local')->has(Auth::user()->picture))
                                        <img class="img-circle img-responsive"  style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{route('account.image',['filename'=>Auth::user()->picture])}}" alt="...">
                                        @else
                                            <img class="img-circle img-responsive" style="border-radius: 50%;border: 2px solid #aaa; float:left; margin-right: 10px; width: 6%;" src="{{asset('img/user.png')}}" alt="...">
                                        @endif  
                                    <div class="panel-google-plus-textarea">
                                    <form action="{{route('comment.make')}}" method="post">
                                        <textarea name="message" rows="4" class="form-control"></textarea>
                                        <button type="submit" class="[ btn btn-primary disabled ]">Post comment</button>
                                        <button type="reset" class="[ btn btn-default ]">Cancel</button>
                                        <input type="hidden" value="{{ $post->id }}" name="post_id" >
                                        <input type="hidden" value="{{ Session::token() }}" name="_token" >
                                    </form>
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
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Motivation of the Day</h4>
                                    <p class="card-category">Date</p>
                                </div>
                                <div class="card-body ">

                                </div>
                                <div class="card-footer ">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
