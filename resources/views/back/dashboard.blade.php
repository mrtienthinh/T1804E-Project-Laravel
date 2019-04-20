@extends('layouts.back')

@section('title', 'TechBlog')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <h3>Welcome to TechBlog, {{\Illuminate\Support\Facades\Auth::user()->name}} !</h3>
                        <h4>Get started</h4>
                        <p><a href="#" class="btn btn-primary">Write your first blog post</a> </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
@endsection