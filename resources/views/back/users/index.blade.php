@extends('layouts.back')

@section('title', 'TechBlog | All User')
@section('content')
    <section class="content-header">
        <h1>
            Users
            <small>All User</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href="">Dashboard</a></li>
            <li class="active">All User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('admin.user.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="pull-right">
                            <fworm accept-charset="utf-8" method="post" class="form-inline" id="form-filter" action="#">
                                <div class="input-group">
                                    <input type="hidden" name="search">
                                    <input type="text" name="keywords" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default search-btn" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </fworm>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-condesed">
                            <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Bio</th>
                                <th>CountPost</th>
                                <th>Role</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td width="100">

                                        <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ action('Back\HomeController@edit', $user['id']) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{action('Back\HomeController@destroy', $user->id)}}" method="post" class="btn btn-xs btn-danger delete-row" style="padding: 0">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times" ></i></button>
                                        </form>
                                        {{$user['id']}}
                                    </td>
                                    <td><a href="{{action('Front\HomeController@show',$user->slug)}}">{{ $user['name'] }}</a></td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['bio'] }}</td>
                                    <td style="text-align: center">{{ $user->posts()->count()}}</td>
                                    <td width="100px">{{ $user->role->name }}</td>
                                    <td width="100px">{{ $user->created_at->diffForHumans() }}</td>
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