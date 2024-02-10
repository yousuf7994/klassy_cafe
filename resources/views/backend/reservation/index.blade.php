@extends('layouts.backend')
@section('title', 'All Reservation')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1>All Reservations</h1>
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
                  <th>Date</th>
                  <th>Time</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                  <td>{{ $reservation->id }}</td>
                  <td>{{ $reservation->name }}</td>
                  <td>{{ $reservation->email }}</td>
                  <td>{{ $reservation->phone }}</td>
                  <td>{{ $reservation->guest }}</td>
                  <td>{{ $reservation->date }}</td>
                  <td>{{ $reservation->time }}</td>
                  <td>{{ Str::limit($reservation->message, 20, '...') }}</td>
                  <td>
                    <a href="{{ route('backend.reservation.edit', $reservation->id) }}" class=" btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('backend.reservation.status', $reservation->id) }}"
                            class=" btn {{ $reservation->status == 'processing' ? 'btn btn-success' : 'btn btn-warning' }}">{{ $reservation->status == 'processing' ? 'Aprove' : 'Processing' }}</a>

                    <a href="{{ route('backend.reservation.delete',$reservation->id) }}" class="btn btn-danger" onclick="return confirm('are you sure to Cancel?')">Cancel</a>
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