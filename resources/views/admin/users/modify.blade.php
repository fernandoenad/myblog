@extends('adminlte::page')

@section('title', 'Users -> Modify user')

@section('content_header')
    <h1>Users -> Modify User</h1>
@stop

@section('content')
    <div class="card">
        <form method="post" action="{{route('admin.users.update', $user)}}">
            @csrf 
            @method('put')
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible auto-close">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session('status') }}
                    </div>            
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}" placeholder="Enter email" readonly>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level">User Level</label>
                    <select name="level" class="form-control @error('level') is-invalid @enderror" id="level" value="{{old('level')}}">
                        <option value="">--- please select ----</option>
                        <option value="0" {{$user->role->level == 0 ? "selected" : ""}}>Staff</option>
                        <option value="1" {{$user->role->level == 1 ? "selected" : ""}}>Administrator</option>
                    </select>
                    @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">User Level</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" value="{{old('status')}}">
                        <option value="">--- please select ----</option>
                        <option value="0" {{$user->role->status == 0 ? "selected" : ""}}>Inactive</option>
                        <option value="1" {{$user->role->status == 1 ? "selected" : ""}}>Active</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('admin.users.index')}}" type="button" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
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