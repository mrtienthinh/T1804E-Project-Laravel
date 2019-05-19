@extends('layouts.back')

@section('title', 'TechBlog | All Categories')
@section('content')
    <section class="content-header">
        <h1>
            Posts
            <small>All Categories</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href="#">Dashboard</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('admin.category.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="pull-right">
                            <form accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
                                <div class="input-group">
                                    <input type="hidden" name="search">
                                    <input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-condesed">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Title</th>
                                <th style="text-align: center">Post</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td width="70">
                                        <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ action('Back\CategoryController@edit', $category['id']) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{action('Back\CategoryController@destroy', $category)}}" method="post" class="btn btn-xs btn-danger delete-row" style="padding: 0">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times" ></i></button>
                                        </form>
                                    </td>
                                    <td>{{ $category['id'] }}</td>
                                    <td><a href="{{action('Front\CategoryController@show', $category->slug)}}">{{ $category['title'] }}</a> </td>
                                    <td style="text-align: center">{{ $category->posts->count() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
@endsection