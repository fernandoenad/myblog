@extends('layouts.template')

@section('content')
<div class="container bg-3"> 
    <h3 class="margin">Home</h3><br>
  <div class="row">
    <div class="col-md-12">
       <h4 class=""><strong>{{$blog->title}}</strong></h4>
       <small>{{$blog->created_at->format('F d, Y')}}</small>
       <p>
           {!!nl2br($blog->content)!!}
       </p>
       <hr>
       <p>
           Comments:
           @foreach($blog->comments as $comment)
              <p>
                Name: {{$comment->name}} <br>
                Email: {{$comment->email}} <br>
                Comment: {{$comment->comment}}
              </p>
           @endforeach
       </p>
       <h3>Comment</h3>
       <div class="row">
        <div class="col-lg-6">
       <div class="card">
        <form method="post" action="{{route('home.comment.store', $blog)}}">
            @csrf 
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" placeholder="Enter name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                          <small><small><small style="color: red;">{{ $message }}</small></small></small>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" placeholder="Enter email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                          <small><small><small style="color: red;">{{ $message }}</small></small></small>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" id="comment" rows="3" placeholder="Enter comment">{{old('content')}}</textarea>
                    @error('comment')
                        <span class="invalid-feedback" role="alert">
                          <small><small><small style="color: red;">{{ $message }}</small></small></small>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{route('admin.blogs.index')}}" type="button" class="btn btn-default float-right">Cancel</a>
            </div>
        </form>
        <p></p>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection
