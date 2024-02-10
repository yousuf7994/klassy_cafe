@extends('layouts.backend')
@section('title', 'My Reservation')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h1 class="text-center">My Reservations</h1>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Guest</th>
                <th>Time</th>
                <th>Date</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($myreservations as $myreservation)
              <tr>
                <td>{{ $myreservation->id }}</td>
                <td>{{ $myreservation->name }}</td>
                <td>{{ $myreservation->email }}</td>
                <td>{{ $myreservation->phone }}</td>
                <td>{{ $myreservation->guest }}</td>
                <td>{{ $myreservation->time }}</td>
                <td>{{ $myreservation->date }}</td>
                <td>{{ Str::limit($myreservation->message, 20, '...') }}</td>
                <td>{{ $myreservation->status }}</td>
                <td>
                  <a href="{{ route('backend.reservation.delete',$myreservation->id) }}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
