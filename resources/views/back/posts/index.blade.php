@extends('layouts.back')

@section('title', 'TechBlog | All Posts')
@section('content')
    <section class="content-header">
        <h1>
            Posts
            <small>All Blog Posts</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href="{{ route('admin.home') }}">Dashboard</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-left">
                            <a id="add-button" title="Add New" class="btn btn-success" href="{{ route('admin.post.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="pull-right">
                            <form accept-charset="utf-8" method="get" class="form-inline" id="form-filter" action="{{ route('admin.search.post')}}">
                                <div class="input-group">
                                    <input type="hidden">
                                    <input type="text" name="key" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search..." value="">
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
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td width="70">
                                        <a title="Edit" class="btn btn-xs btn-default edit-row" href="{{ action('Back\PostController@edit', $post->slug) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{action('Back\PostController@destroy', $post->slug)}}" method="post" class="btn btn-xs btn-danger delete-row" style="padding: 0">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times" ></i></button>
                                        </form>
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->date }}</td>
                                    {{--<td><abbr title="2016/12/04 6:32:00 PM">2016/12/04</abbr> | <span class="label label-info">Schedule</span></td>--}}
                                </tr>
                            @endforeach


                            <tr>
                                <td width="70">
                                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="#">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-xs btn-danger delete-row" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                <td>John Doe</td>
                                <td>Programming</td>
                                <td><abbr title="2016/12/04 6:32:00 PM">2016/12/04</abbr> | <span class="label label-info">Schedule</span></td>
                            </tr>
                            <tr>
                                <td width="70">
                                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="#">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-xs btn-danger delete-row" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                <td>John Doe</td>
                                <td>Programming</td>
                                <td><abbr title="2016/12/04 6:32:00 PM">2016/12/04</abbr> | <span class="label label-warning">Draft</span></td>
                            </tr>
                            <tr>
                                <td width="70">
                                    <a title="Edit" class="btn btn-xs btn-default edit-row" href="#">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-xs btn-danger delete-row" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                <td>John Doe</td>
                                <td>Programming</td>
                                <td><abbr title="2016/12/04 6:32:00 PM">2016/12/04</abbr> | <span class="label label-success">Published</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{$posts->render()}}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection

