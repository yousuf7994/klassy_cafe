@extends('layouts.backend')
@section('content')
  <h1>Welcome to the Paradise <b style="color: skyblue">{{ Auth::user()->name }}</b></h1>
  <p>Lorem ipsum dolor sit amet.</p>
  <div>
    <img src="backend/assets/images/faces/face15.jpg" alt="">
  </div>
  
@endsection
