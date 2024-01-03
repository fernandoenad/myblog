@extends('layouts.template')

@section('content')
<div class="container bg-3"> 
    <h3 class="margin">Home</h3><br>
  <div class="row">
    <div class="col-md-12">
       <h4 class=""><strong>{{$blog->title}}</strong></h4>
       <p>
           {{$blog->content}}
       </p>
    </div>
  </div>
</div>
@endsection
