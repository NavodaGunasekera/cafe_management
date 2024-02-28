@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header">Update the client</div>
                    <div class="form-group">
                        @include('components.alerts')
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('update-client/'.$client->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fname">First Name</label><br>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                            value="{{$client->first_name}}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label><br>
                                        <input type="text" class="form-control" id="lname" name="lname"
                                            value="{{$client->last_name}}" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contact">Contact</label><br>
                                        <input type="text" class="form-control" id="contact" name="contact"
                                            value="{{$client->contact}}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email Address</label><br>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{$client->email}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="gender">Gender</label><br>
                                        <select class="form-control" id="gender" name="gender" required>

                                            <option value="0" {{ $client->gender == '0' ? 'selected' : '' }}>Male</option>
                                            <option value="1" {{ $client->gender == '1' ? 'selected' : '' }}>Female</option>

                                          </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="dateField1">Date of birthday</label><br>
                                        <input id="dateField1" type="date" name="date_of_birth" value="{{$client->dob}}" required>
                                        {{-- <input id="dateField1" type="text"/> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="street_no">Street No</label><br>
                                        <input type="text" class="form-control" id="street_no" name="street_no"
                                            value="{{$client->street_no}}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="street_address">Street Address</label><br>
                                        <input type="street_address" class="form-control" id="street_address" name="street_address"
                                            value="{{$client->street_address}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city">City</label><br>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{$client->city}}" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                        <label for="status">Active/Inactive</label><br>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status">
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Save</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
