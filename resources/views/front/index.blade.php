@extends('layouts.front')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <article class="post-item">
                @if($post->image != null)
                <div class="post-item-image">
                    <a href="{{ route('post.show', $post->slug) }}">
                        <img src="{{asset('storage/posts_image/'.$post->image)}}" alt="">
                    </a>
                </div>
                @else
                @endif
                <div class="post-item-body">
                    <div class="padding-10">
                        <h2><a href="{{ route('post.show', $post->slug) }}" style="color: black">{{$post['title']}}</a></h2>
                        <p>{{$post['excerpt']}}</p>
                        {{--<p>{{$post['body']}}</p>--}}
                    </div>
                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="{{$post->user_id == null ? "#" : action('Front\HomeController@show',$post->user->slug)}}" style="color: #72afd2;">{{$post->user_id == null ? "Author" : $post->user->name}}</a></li>
                                <li><i class="fa fa-clock-o"></i><time>{{$post->published_at->diffForHumans()}}</time></li>
                                <li><i class="fa fa-tags"></i><a href="{{ $post->category_id != null ? action('Front\CategoryController@show',$post->category->slug) : ""}}">{{ $post->category_id != null ? $post->category->title : "None"}}</a></li>
                                <li><i class="fa fa-eye"></i><a href="#">{{$post->view_count}}</a></li>
                                <li><i class="fa fa-comments"></i><a href="#">{{$post->comments->count()}}</a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <a href="{{action('Front\PostController@show',$post->slug)}}">Continue Reading &raquo;</a>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
            <div style="text-align: center" class="">
                {!! $posts->links() !!}
            </div>
        </div>
        <div class="col-md-4">
            @include('front.inc.sidebar')
        </div>
    </div>
</div>

@endsection