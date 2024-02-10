@extends('layouts.backend')
@section('title', 'Shipping Charge')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shipping Charge</li>
          </ol>
        </nav>
        <h1 class="m-0">Shipping Charge</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid page__container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>All Shipping Charge</h4>
          </div>
          <div class="card-body">
            <table class=" table">
              <tr>
                <th>ID</th>
                <th>Location</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach ($sCharges as $sCharge)
                <tr>
                  <td>{{ $sCharge->id }}</td>
                  <td>{{ $sCharge->location }}</td>
                  <td>{{ $sCharge->charge }}</td>
                  <td>{{ $sCharge->status }}</td>
                  <td>
                    <a href="#">Edit</a>
                  </td>
                </tr>
              @endforeach
              
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Add Shipping Charge</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.shippingcharge.store') }}" method="POST">
              @csrf
              <div class=" form-group">
                <input type="text" class="form-control mb-3" name="location" placeholder="Location" value="{{ old('location') }}">
              </div>
              <div class=" form-group">
                <input type="number" class="form-control mb-3" name="charge" placeholder="Amount" value="{{ old('charge') }}">
              </div>
              <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection