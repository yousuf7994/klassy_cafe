@extends('layouts.backend')
@section('title', 'All Cake_pastry Menu')
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
                <h4 class=" text-center">Active cake_pastrys</h4>
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

                    @foreach ($activeCake_pastry as $cake_pastry)
                      <tr>
                        <td>{{ $cake_pastry->id }}</td>
                        <td>
                          <img src="{{ asset('storage/cake_pastry/' . $cake_pastry->photo) }}" width="80px" alt="">
                        </td>
                        <td>{{ $cake_pastry->name }}</td>
                        <td>{{ $cake_pastry->price }}</td>
                        <td>{{ $cake_pastry->description }}</td>
                        <td>

                          <a href="{{ route('backend.cake_pastry.edit', $cake_pastry->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.cake_pastry.status', $cake_pastry->id) }}"
                            class=" btn {{ $cake_pastry->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $cake_pastry->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.cake_pastry.trash', $cake_pastry->id) }}"
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
                <h4 class=" text-center">Draft cake_pastrys</h4>
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

                    @foreach ($draftCake_pastry as $cake_pastry)
                      <tr>
                        <td>{{ $cake_pastry->id }}</td>
                        <td>
                          <img src="{{ asset('storage/cake_pastry/' . $cake_pastry->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $cake_pastry->name }}</td>
                        <td>{{ $cake_pastry->price }}</td>
                        <td>{{ $cake_pastry->description }}</td>
                        <td>

                          <a href="{{ route('backend.cake_pastry.edit', $cake_pastry->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.cake_pastry.status', $cake_pastry->id) }}"
                            class=" btn {{ $cake_pastry->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $cake_pastry->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.cake_pastry.trash', $cake_pastry->id) }}"
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
                <h4 class=" text-center">Trashed cake_pastrys</h4>
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

                    @foreach ($trashCake_pastry as $cake_pastry)
                      <tr>
                        <td>{{ $cake_pastry->id }}</td>
                        <td>
                          <img src="{{ asset('storage/cake_pastry/' . $cake_pastry->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $cake_pastry->name }}</td>
                        <td>{{ $cake_pastry->price }}</td>
                        <td>{{ $cake_pastry->description }}</td>
                        <td>

                          <a href="{{ route('backend.cake_pastry.reStore', $cake_pastry->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.cake_pastry.permDelete', $cake_pastry->id) }}"
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