@extends('layouts.backend')
@section('title', 'Edit Breakfast Menu')
@section('content')
  <div class="container-fluid page__heading-container text-white" style="background: #9b9999;padding-top:10px">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Breakfast Menu</li>
          </ol>
        </nav>
        <h1 class="m-0">Breakfast Menu</h1>
      </div>
    </div>
  </div>
  <section style="background: #9b9999;padding-bottom:10px">
    <div class="container-fluid" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card">
            <div class="card-header">
              <h1 class="text-center text-white" style="background: #9b9999;padding-bottom:10px">Add Breakfast Menu</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.breakfast.update',$breakfast->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class=" form-control" placeholder="Enter Breakfast Name" value="{{ $breakfast->name }}">
                </div>
                <div class=" form-group">
                  <b>Description:</b>
                  <textarea name="description" class=" form-control " rows="7">{{ $breakfast->description }}</textarea>
                </div>
                <div class=" form-group">
                  <b>Photo:</b>
                  <input type="file" name="photo" class=" form-control">
                </div>
                <div class=" form-group">
                  <b>Price:</b>
                  <input type="number" name="price" class=" form-control" placeholder="Enter Price" value="{{ $breakfast->price }}">
                </div>                
                <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
