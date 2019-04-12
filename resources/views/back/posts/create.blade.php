@extends('layouts.back')

@section('title', 'MyBlog | Add new post')

@section('content')
    <section class="content-header">
        <h1>
            Add New Post
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ asset('post') }}">Post</a></li>
            <li class="active">Add New Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

            <!-- form start -->
            <form method="post" action="{{url('post')}}" role = 'form'>
                {{csrf_field()}}
                {{--set user_id = 1 at here --}}
                <input name="user_id" type="hidden" value="1">
                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name='title' type="text" placeholder="Enter Title here" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input name="slug" type="text" class="form-control">

                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label for="body">Excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" rows="10" class="form-control"></textarea>
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
                            <input name="published_at" type="text" class="form-control" placeholder="YYYY-MM-DD HH:MM:SS">
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
                                    <input type="radio" name="category_id" value="{{ $category['id'] }}">
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
                                <img src="http://placehold.it/200x200" width="100%" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
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
