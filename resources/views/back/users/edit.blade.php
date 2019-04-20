@extends('layouts.back')

@section('title', 'TechBlog | Add new user')

@section('content')
    <section class="content-header">
        <h1>
            Add New User
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('admin.user.index') }}">Users</a></li>
            <li class="active">Add New User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form method="post" action="{{action('Back\HomeController@update', $user->id)}}" role = 'form'>
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="col-xs-9">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">User's name</label>
                                <input id="title" name='name' type="text" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" value="{{$user->slug}}">
                            </div>
                            <div class="form-group">
                                <label for="title">User's email</label>
                                <input id="title" name='email' type="email" class="form-control" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="title">User's bio</label>
                                <input id="title" name='bio' type="text" class="form-control" value="{{$user->bio}}">
                            </div>
                            <div class="form-group">
                                <label for="title">User's password</label>
                                <input id="title" name='password' type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="title">Re-Enter your password</label>
                                <input id="title" name='repassword' type="password" class="form-control">
                            </div>
                            <select name="role_id" style="display: block;width: 100%;height: 36px;border: #d1d1d1 1px solid;margin-top: 29px;text-transform: uppercase">
                                @foreach(\App\Role::all() as $role)
                                    <option value="{{$role->id}}" style="text-transform: uppercase">{{$role->name}}</option>
                                @endforeach
                            </select>
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