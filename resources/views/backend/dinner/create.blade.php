@extends('layouts.backend')
@section('title', 'Add Dinner Menu')
@section('content')
  <div class="container-fluid page__heading-container text-white" style="background: #9b9999;padding-top:10px">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dinner Menu</li>
          </ol>
        </nav>
        <h1 class="m-0">Dinner Menu</h1>
      </div>
    </div>
  </div>
  <section style="background: #9b9999;padding-bottom:10px">
    <div class="container-fluid" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card">
            <div class="card-header">
              <h1 class="text-center text-white" style="background: #9b9999;padding-bottom:10px">Add Dinner Menu</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.dinner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class=" form-control" placeholder="Enter Dinner Name">
                </div>
                <div class=" form-group">
                  <b>Description:</b>
                  <textarea name="description" class=" form-control " rows="7" placeholder="Enter Description"></textarea>
                </div>
                <div class=" form-group">
                  <b>Photo:</b>
                  <input type="file" name="photo" class=" form-control">
                </div>
                <div class=" form-group">
                  <b>Price:</b>
                  <input type="number" name="price" class=" form-control" placeholder="Enter Price">
                </div>                
                <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
