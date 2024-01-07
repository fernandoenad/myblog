@extends('adminlte::page')

@section('title', 'Blogs -> Delete blog')

@section('content_header')
    <h1>Blogs -> Delete Blog</h1>
@stop

@section('content')
    <div  class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <form method="post" action="{{route('admin.blogs.destroy', $blog)}}">
                    @csrf 
                    @method('delete')
                    <div class="card-header">
                        <h3>System Confirmation</h3>
                    </div>
                    <div class="card-body">
                        <p>You are about to delete this blog. Are you sure with your action?</p>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <a href="{{route('admin.blogs.index')}}" type="button" class="btn btn-default float-right">No</a>
                    </div>
                </form>
            </div>
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