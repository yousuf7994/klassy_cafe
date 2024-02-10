@extends('layouts.frontend')
@section('content')
  <div class="container" style="margin-top: 100px">
    @include('alert.messsage')
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4 mt-5">
            <div>
              <h4>
                Email: hello@klassycafe.com
              </h4>
              <h4>
                Contact:+88745214
              </h4>
            </div>
          </div>
          
          <div class="col-lg-8">
            
            <div class="card">
              <div class="card-header">
                
                <h1 class=" text-center">Contact us</h1>
              </div>
              <div class="card-body">
                <form action="{{ route('frontend.contactStore') }}" method="POST">
                  @csrf
                  <div class=" form-group">
                    <b>Name:</b>
                    <input type="text" name="name" class=" form-control" placeholder="Enter Your Name">
                  </div>
                  <div class=" form-group">
                    <b>Email:</b>
                    <input type="email" name="email" class=" form-control" placeholder="Enter Your Email">
                  </div>
                  <div class=" form-group">
                    <b>Phone:</b>
                    <input type="number" name="phone" class=" form-control" placeholder="Enter Phone Number">
                  </div>
                  <div class=" form-group">
                    <b>Message:</b>
                    <textarea name="message" class=" form-control" placeholder="Enter Message" rows="7"></textarea>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
