@extends('layouts.template')

@section('content')
<div class="container bg-3"> 
    <h3 class="margin">Home</h3><br>
  <div class="row">
    <div class="col-md-12">

        @foreach($blogs as $blog)
            <a href="{{route('home.show', $blog)}}">
                <h4 class=""><strong>{{$blog->title}}</strong></h4>
            </a>
            <p>
                {{substr($blog->content,0,150)}}...
            </p>
            <hr>
        @endforeach
    </div>
  </div>
</div>
@endsection
