@extends('layouts.back')

@section('title', 'TechBlog | Add new category')

@section('content')
    <section class="content-header">
        <h1>
            Add New Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ asset('category') }}">Categories</a></li>
            <li class="active">Add New Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form method="post" action="{{ action('Back\CategoryController@update', $category->id) }}" role = 'form'>
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Category Name</label>
                                <input id="title" name='title' type="text" class="form-control" value="{{ $category->title }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" value=" {{ $category->slug }}">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection