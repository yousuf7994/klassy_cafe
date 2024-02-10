@extends('layouts.backend')
@section('title', 'Coupon')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Coupon</li>
          </ol>
        </nav>
        <h1 class="m-0">Coupon</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid page__container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>All Coupon</h4>
          </div>
          <div class="card-body">
            <table class=" table">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Discount</th>
                <th>Minimum Amount</th>
                <th>Expire Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach ($coupons as $coupon)
                <tr>
                  <td>{{ $coupon->id }}</td>
                  <td>{{ $coupon->name }}</td>
                  <td>{{ $coupon->discount }}</td>
                  <td>{{ $coupon->limit }}</td>
                  <td>{{ $coupon->expire_date->isoFormat('D MMM Y') }}</td>
                  <td>{{ $coupon->status }}</td>
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
            <h4>Add Coupon</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.coupon.store') }}" method="POST">
              @csrf
              <div class=" form-group">
                <input type="text" class="form-control mb-3" name="name" placeholder="Name" value="{{ old('name') }}">
              </div>
              <div class=" form-group">
                <input type="number" class="form-control mb-3" name="amount" placeholder="Amount" value="{{ old('discount') }}">
              </div>
              <div class=" form-group">
                <input type="number" class="form-control mb-3" name="limit" placeholder="Minimum Amount" value="{{ old('limit') }}">
              </div>
              <div class=" form-group">
                <input type="date" class="form-control mb-3" name="expire_date" placeholder="Date" value="{{ old('expire_date') }}">
              </div>
              <button type="submit" class=" btn btn-sm btn-primary my-3">Add+</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection