@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    <h1>Blogs</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Blog list</h3>
            <div class="card-tools">
                <a href="{{route('admin.blogs.create')}}" class="btn btn-primary form-control float-right">Create new blog</a>
            </div>
        </div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible auto-close">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('status') }}
                </div>            
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->title}}</td>
                            <td>{{substr($blog->content,0,50)}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('footer')
    Copyright &copy 2023. <a href='/admin'>Fernan's Blog</a>. All rights reserved.
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop