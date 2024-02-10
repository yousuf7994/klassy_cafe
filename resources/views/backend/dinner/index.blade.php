@extends('layouts.backend')
@section('title', 'All Dinner Menu')
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
                <h4 class=" text-center">Active dinners</h4>
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

                    @foreach ($activeDinner as $dinner)
                      <tr>
                        <td>{{ $dinner->id }}</td>
                        <td>
                          <img src="{{ asset('storage/dinner/' . $dinner->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $dinner->name }}</td>
                        <td>{{ $dinner->price }}</td>
                        <td>{{ $dinner->description }}</td>
                        <td>

                          <a href="{{ route('backend.dinner.edit', $dinner->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.dinner.status', $dinner->id) }}"
                            class=" btn {{ $dinner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $dinner->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.dinner.trash', $dinner->id) }}"
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
                <h4 class=" text-center">Draft dinners</h4>
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

                    @foreach ($draftDinner as $dinner)
                      <tr>
                        <td>{{ $dinner->id }}</td>
                        <td>
                          <img src="{{ asset('storage/dinner/' . $dinner->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $dinner->name }}</td>
                        <td>{{ $dinner->price }}</td>
                        <td>{{ $dinner->description }}</td>
                        <td>

                          <a href="{{ route('backend.dinner.edit', $dinner->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.dinner.status', $dinner->id) }}"
                            class=" btn {{ $dinner->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $dinner->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.dinner.trash', $dinner->id) }}"
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
                <h4 class=" text-center">Trashed dinners</h4>
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

                    @foreach ($trashDinner as $dinner)
                      <tr>
                        <td>{{ $dinner->id }}</td>
                        <td>
                          <img src="{{ asset('storage/dinner/' . $dinner->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $dinner->name }}</td>
                        <td>{{ $dinner->price }}</td>
                        <td>{{ $dinner->description }}</td>
                        <td>

                          <a href="{{ route('backend.dinner.reStore', $dinner->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.dinner.permDelete', $dinner->id) }}"
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