@extends('layouts.backend')
@section('title', 'All Breakfast Menu')
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
                <h4 class=" text-center">Active breakfasts</h4>
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

                    @foreach ($activeBreakfast as $breakfast)
                      <tr>
                        <td>{{ $breakfast->id }}</td>
                        <td>
                          <img src="{{ asset('storage/breakfast/' . $breakfast->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $breakfast->name }}</td>
                        <td>{{ $breakfast->price }}</td>
                        <td>{{ $breakfast->description }}</td>
                        <td>

                          <a href="{{ route('backend.breakfast.edit', $breakfast->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.breakfast.status', $breakfast->id) }}"
                            class=" btn {{ $breakfast->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $breakfast->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.breakfast.trash', $breakfast->id) }}"
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
                <h4 class=" text-center">Draft breakfasts</h4>
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

                    @foreach ($draftBreakfast as $breakfast)
                      <tr>
                        <td>{{ $breakfast->id }}</td>
                        <td>
                          <img src="{{ asset('storage/breakfast/' . $breakfast->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $breakfast->name }}</td>
                        <td>{{ $breakfast->price }}</td>
                        <td>{{ $breakfast->description }}</td>
                        <td>

                          <a href="{{ route('backend.breakfast.edit', $breakfast->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.breakfast.status', $breakfast->id) }}"
                            class=" btn {{ $breakfast->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $breakfast->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.breakfast.trash', $breakfast->id) }}"
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
                <h4 class=" text-center">Trashed breakfasts</h4>
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

                    @foreach ($trashBreakfast as $breakfast)
                      <tr>
                        <td>{{ $breakfast->id }}</td>
                        <td>
                          <img src="{{ asset('storage/breakfast/' . $breakfast->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $breakfast->name }}</td>
                        <td>{{ $breakfast->price }}</td>
                        <td>{{ $breakfast->description }}</td>
                        <td>

                          <a href="{{ route('backend.breakfast.reStore', $breakfast->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.breakfast.permDelete', $breakfast->id) }}"
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