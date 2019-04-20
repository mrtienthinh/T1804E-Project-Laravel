@extends('layouts.front')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article class="post-item post-detail">
                @if($post->image != null)
                <div class="post-item-image">
                    <a href="#">
                        <img src="{{asset('storage/posts_image/'.$post->image)}}" alt="">
                    </a>
                </div>
                @else
                @endif


                <div class="post-item-body">
                    <div class="padding-10">
                        <h1>{{$post->title}}</h1>
                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{action('Front\HomeController@show',$post->user->slug)}}" style="color: #72afd2;"> {{$post->user->name}}</a></li>
                                <li><i class="fa fa-clock-o"></i><time> {{$post->published_at->diffForHumans()}}</time></li>
                                <li><i class="fa fa-tags"></i><a href="#"> {{$post->category->title}}</a></li>
                                <li><i class="fa fa-eye"></i><a href="#">{{$post->view_count}}</a></li>
                                <li><i class="fa fa-comments"></i><a href="#"> {{$post->comments->count()}}</a></li>
                            </ul>
                        </div>
                        <p style="text-align: justify">{{$post->body}}</p>
                    </div>
                </div>
            </article>

            <article class="post-author padding-10">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img alt="Author 1" src="{{asset('img/user'.rand(1,8).'-128x128.jpg')}}" class="media-object">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{action('Front\HomeController@show', $post->user->slug)}}">{{$post->user->name}}</a></h4>
                        <div class="post-author-count">
                            <a href="#">
                                <i class="fa fa-clone"></i>
                                {{$post->user->posts->count()}} posts
                            </a>
                        </div>
                        <p>{{$post->user->bio}}</p>
                    </div>
                </div>
            </article>

            <article class="post-comments">
                <h3><i class="fa fa-comments"></i> {{$post->comments->count()}} Comments</h3>
                @if(\Illuminate\Support\Facades\Auth::user() == null)
                <h3><a href="{{route('login')}}">Login to comment</a></h3>
                @endif

                <div class="comment-body padding-10">
                    <ul class="comments-list">
                        @if($post->comments != null)
                        @foreach($post->comments->sortByDesc('created_at') as $comment)
                        <li class="comment-item">
                            <div class="comment-heading clearfix">
                                <div class="comment-author-meta">
                                    <h4>{{$comment->user->name}} <small>{{$comment->created_at->diffForHumans()}}</small></h4>

                                </div>
                            </div>
                            <div class="comment-content">
                                <p style="text-align: justify">{{$comment->body}}</p>
                            </div>
                        </li>
                        @endforeach
                        @else
                        @endif
                    </ul>

                </div>
                @if(\Illuminate\Support\Facades\Auth::user() != null)
                <div class="comment-footer padding-10">
                    <h3>Leave a comment</h3>
                    <form action="{{action('Front\CommentController@store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group required">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" readonly>
                        </div>
                        <div class="form-group required">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" readonly>
                        </div>
                        <div class="form-group required">
                            <input type="hidden" name="post_id" class="form-control" value="{{$post->id}}" readonly>
                        </div>
                        <div class="form-group required">
                            <label for="comment">Comment</label>
                            <textarea name="body" id="comment" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-lg btn-success">Submit</button>
                            </div>
                            <div class="pull-right">
                                <p class="text-muted">
                                    <span class="required">*</span>
                                    <em>Indicates required fields</em>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </article>
        </div>
        <div class="col-md-4">
            @include('front.inc.sidebar')
        </div>
    </div>
</div>

@endsection