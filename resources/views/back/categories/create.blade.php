@extends('layouts.back')

@section('title', 'MyBlog | Add new category')

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

                <form method="post" action="{{url('category')}}" role = 'form'>
                    {{csrf_field()}}
                    <div class="col-xs-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">New Category</label>
                                    <input name='title' type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input name="slug" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </section>
@endsection