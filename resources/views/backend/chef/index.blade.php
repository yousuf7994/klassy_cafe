@extends('layouts.backend')
@section('title', 'All Chefs')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-toggle="tab" data-target="#active"><b>Active</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#draft"><b>Draft</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-toggle="tab" data-target="#trash"><b>Trash</b></button>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="active">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Active Chefs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Chef Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($activeChefs as $chef)
                      <tr>
                        <td>{{ $chef->id }}</td>
                        <td>
                          <img src="{{ asset('storage/chef/' . $chef->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $chef->name }}</td>
                        <td>{{ $chef->email }}</td>
                        <td>{{ $chef->designation }}</td>
                        <td>{{ $chef->phone }}</td>
                        <td>{{ $chef->chef_id }}</td>
                        <td>

                          <a href="{{ route('backend.chef.edit', $chef->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.chef.status', $chef->id) }}"
                            class=" btn {{ $chef->status == '1' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $chef->status == '1' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.chef.trash', $chef->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="draft">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Draft chefs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>chef Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($draftChefs as $chef)
                      <tr>
                        <td>{{ $chef->id }}</td>
                        <td>
                          <img src="{{ asset('storage/chef/' . $chef->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $chef->name }}</td>
                        <td>{{ $chef->email }}</td>
                        <td>{{ $chef->designation }}</td>
                        <td>{{ $chef->phone }}</td>
                        <td>{{ $chef->chef_id }}</td>
                        <td>

                          <a href="{{ route('backend.chef.edit', $chef->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.chef.status', $chef->id) }}"
                            class=" btn {{ $chef->status == '1' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $chef->status == '1' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.chef.trash', $chef->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>

                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="trash">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Trashed chefs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Chef Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($trashChefs as $chef)
                      <tr>
                        <td>{{ $chef->id }}</td>
                        <td>
                          <img src="{{ asset('storage/chef/' . $chef->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $chef->name }}</td>
                        <td>{{ $chef->email }}</td>
                        <td>{{ $chef->designation }}</td>
                        <td>{{ $chef->phone }}</td>
                        <td>{{ $chef->chef_id }}</td>
                        <td>

                          <a href="{{ route('backend.chef.reStore', $chef->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.chef.delete', $chef->id) }}"
                            class=" btn btn-sm btn-danger" onclick="return confirm('Are you Sure to Delete?')"> Delete </a>


                          </form>
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
    </div>
  </div>
@endsection