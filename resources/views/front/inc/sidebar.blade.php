<aside class="right-sidebar">
    <div class="search-widget">
        <form action="{{action('Front\PostController@searchPost')}}" method="get">
            <div class="input-group">
                <input type="text" name="postBody" class="form-control input-lg" placeholder="Search for...">
                <span class="input-group-btn">
                    <button type= "submit" class="btn btn-lg btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>

    <div class="widget">
        <div class="widget-heading">
            <h4>Categories</h4>
        </div>
        <div class="widget-body">
            <ul class="categories">
                @foreach($categories as $category)
                    <li>
                        <a href="{{action('Front\CategoryController@show',$category->slug)}}" style="color: gray; {{strrchr(url()->current(),"/") == "/".$category->slug ? "font-weight: bold" : ""}}"><i class="fa fa-angle-right"></i> {{$category->title}}</a>
                        <span class="badge pull-right"> {{$category->posts->count()}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="widget">
        <div class="widget-heading">
            <h4>Popular Posts</h4>
        </div>
        <div class="widget-body">
            <ul class="popular-posts">
                @foreach($postPopular as $post)
                <li>
                    @if($post->image != null)
                    <div class="post-image">
                        <a href="{{action('Front\PostController@show',$post->slug)}}">
                            <img src="{{asset('storage/posts_image/'.$post->image)}}" />
                        </a>
                    </div>
                    @else
                    @endif
                    <div class="post-body">
                        <h6><a href="{{action('Front\PostController@show',$post->slug)}}" style="color: gray">{{$post->title}}</a></h6>
                        <div class="post-meta">
                            <span><a href="{{action('Front\HomeController@show',$post->user->slug)}}">{{$post->user->name}}</a></span>
                            <p>{{$post->view_count}} <i class="fa fa-eye" aria-hidden="true"></i>
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="widget">
        <div class="widget-heading">
            <h4>Tags</h4>
        </div>
        <div class="widget-body">
            <ul class="tags">
                @foreach($tags as $tag)
                <li><a href="{{action('Front\TagController@show', $tag->slug)}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>