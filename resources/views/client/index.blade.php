@extends('layouts.admin')

@section('content')

    <div class="card">

        <div class="form-group">
            @include('components.alerts')
        </div>
        <div class="card-body">
            <div class="create-new float-right mb-4">

                <a href="{{url('create-client')}}" class="btn btn-primary">CREATE NEW</a>
            </div>

            <h5 class="card-title mt-4">CLIENTS</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contacts</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td></td>
                            <td>{{ $client->first_name }} {{$client->last_name}}</td>
                            <td>{{ $client->contact }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                <?php if ( $client->status == 1 ) { ?>
                                    <button type="button" class="btn btn-success">Active</button>
                                <?php }else{ ?>
                                    <button type="button" class="btn btn-secondary">Inactive</button>
                                <?php } ?>
                            </td>
                            <td><a class="btn btn-success btn-sm" href="{{ url('edit-client/' . $client->id) }}">Edit</a>

                                {{-- Delete confirmation popup --}}
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmationModal{{$client->id}}">
                                    Delete Client
                                </button>
                                <div class="modal" id="confirmationModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to delete this client?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                          <form method="POST" class="mt-2" action="{{ url('delete/' . $client->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Yes</button>
                                        </form>

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  {{-- view popup --}}
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewModal{{$client->id}}">
                                   View
                                    </button>
                                    <div class="modal" id="viewModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel">Clients Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <p>First Name: {{$client->first_name}}</p>
                                            <p>Last Name: {{$client->last_name}}</p>
                                            <p>Name: {{$client->first_name}} {{$client->last_name}}</p>
                                            <p>Contact: {{$client->contact}} </p>
                                            <p>Email Address: {{$client->email}} </p>
                                            <p>Date of Birth:  {{$client->dob}} </p>
                                            <p>Address:  {{$client->street_address}} </p>

                                        </div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
