@extends('layouts.backend')
@section('title', 'Edit Reservation')
@section('content')
  <div class="container-fluid page__heading-container text-white" style="background: #9b9999;padding-top:10px">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reservation</li>
          </ol>
        </nav>
        <h1 class="m-0">Reservation</h1>
      </div>
    </div>
  </div>
  <section style="background: #9b9999;padding-bottom:10px">
    <div class="container-fluid" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card">
            <div class="card-header">
              <h1 class="text-center text-white" style="background: #9b9999;padding-bottom:10px">Edit Reservation</h1>
            </div>
            <div class="card-body">
              <form action="{{ route('backend.reservation.update',$reservation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class=" form-control" placeholder="Enter reservation Name" value="{{ $reservation->name }}">
                </div>
                <div class=" form-group">
                  <b>Email:</b>
                  <input type="email" name="email" class=" form-control" value="{{ $reservation->email }}">
                </div>
                <div class=" form-group">
                  <b>Phone:</b>
                  <input type="number" name="phone" class=" form-control" value="{{ $reservation->phone }}">
                </div>
                <div class=" form-group">
                  <b>Guest:</b>
                  <input type="number" name="guest" class=" form-control" value="{{ $reservation->guest }}">
                </div>
                <div class=" form-group">
                  <b>Date:</b>
                  <input type="date" name="date" class=" form-control" value="{{ $reservation->date }}">
                </div>
                <div class=" form-group">
                  <b>Time:</b>
                  <input type="text" name="time" class=" form-control" value="{{ $reservation->time }}">
                </div>
                <div class=" form-group">
                  <b>Message:</b>
                  <textarea name="message" class=" form-control " rows="7">{{ $reservation->message }}</textarea>
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
