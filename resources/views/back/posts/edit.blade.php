@extends('layouts.back')

@section('title', 'TechBlog | Edit Post')

@section('content')
    <section class="content-header">
        <h1>
            Edit Post: <span class="small">{{$post->title}}</span>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.post.index')}}">Post</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- form start -->
            <form method="post" action="{{action('Back\PostController@update',$post->slug)}}" role = 'form' enctype='multipart/form-data'>
                {{csrf_field()}}
                {{method_field("PUT")}}
                {{--set user_id = 1 at here --}}
                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title" name='title' value="{{$post->title}}" type="text" placeholder="Enter Title here" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" name="slug" value="{{$post->slug}}" type="text" class="form-control">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label for="body">Excerpt</label>
                                <textarea name="excerpt" value="{{$post->excerpt}}" id="excerpt" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" value="" rows="10" class="form-control">{{$post->body}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Publish</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group" id="pickDate">
                                <label for="published_at">Publish date</label>
                                <input id="datetimepicker1" name="published_at" type="text" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
                            </div>
                        </div>
                        <div class="box-footer clearfix">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default">Save Draft</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-primary">Publish</a>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category</h3>
                        </div>
                        <div class="box-body">
                            @foreach($categories as $category)
                                <div class="radio">
                                    <label>
                                        <input type="radio" class="radio{{ $category['id'] }}" name="category_id" value="{{ $category['id'] }}">
                                        {{ $category['title'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Feature Image</h3>
                        </div>
                        <div class="box-body text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{asset('storage/posts_image/'.$post->image)}}" width="100%" alt="{{$post->image}}">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="post_image">
                            </span>
                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection

@section('style')
    <link rel="stylesheet" href="/plugins/tag-editor/jquery.tag-editor.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('script')
    <script src="/plugins/tag-editor/jquery.caret.min.js"></script>
    <script src="/plugins/tag-editor/jquery.tag-editor.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        simplemde1.value("{!! $post->excerpt !!}");

//         var trimTextBody = textBody.replace('/n/n','/n');
        var simplemde2 = new SimpleMDE({ element: $("#body")[0],});

        $(".radio{{ $post->category_id }}").prop("checked", true);


        $(function() {
            $('#datetimepicker1').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                {!! $post->published_at != null ? "startDate: '".$post->published_at."'," : "startDate: moment().startOf('second')," !!}
                locale: {
                    format: 'YYYY-MM-DD hh:mm:ss'
                }
            }, function(start, end, label) {
            });
        });

        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });

    </script>
@endsection
