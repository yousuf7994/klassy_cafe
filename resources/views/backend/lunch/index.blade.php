@extends('layouts.backend')
@section('title', 'All Lunch Menu')
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
                <h4 class=" text-center">Active lunchs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($activeLunch as $lunch)
                      <tr>
                        <td>{{ $lunch->id }}</td>
                        <td>
                          <img src="{{ asset('storage/lunch/' . $lunch->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $lunch->name }}</td>
                        <td>{{ $lunch->price }}</td>
                        <td>{{ $lunch->description }}</td>
                        <td>

                          <a href="{{ route('backend.lunch.edit', $lunch->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.lunch.status', $lunch->id) }}"
                            class=" btn {{ $lunch->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $lunch->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.lunch.trash', $lunch->id) }}"
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
                <h4 class=" text-center">Draft lunchs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($draftLunch as $lunch)
                      <tr>
                        <td>{{ $lunch->id }}</td>
                        <td>
                          <img src="{{ asset('storage/lunch/' . $lunch->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $lunch->name }}</td>
                        <td>{{ $lunch->price }}</td>
                        <td>{{ $lunch->description }}</td>
                        <td>

                          <a href="{{ route('backend.lunch.edit', $lunch->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.lunch.status', $lunch->id) }}"
                            class=" btn {{ $lunch->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $lunch->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.lunch.trash', $lunch->id) }}"
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
                <h4 class=" text-center">Trashed lunchs</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table">

                    @foreach ($trashLunch as $lunch)
                      <tr>
                        <td>{{ $lunch->id }}</td>
                        <td>
                          <img src="{{ asset('storage/lunch/' . $lunch->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $lunch->name }}</td>
                        <td>{{ $lunch->price }}</td>
                        <td>{{ $lunch->description }}</td>
                        <td>

                          <a href="{{ route('backend.lunch.reStore', $lunch->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.lunch.permDelete', $lunch->id) }}"
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