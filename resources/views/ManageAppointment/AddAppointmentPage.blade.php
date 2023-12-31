@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">


            <div class="page-header-title">
                <i class="ik ik-calendar bg-blue"></i>
                <div class="d-inline">
                    <h5>Appointment</h5>
                    <span>Make an appointment based on the availability of your supervisor</span>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('dashboard')}}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('indexAppointment') }}">Appointment</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>

    </div>
</div>

<div class="container">
    @if(Session::has('message'))
    <div class="alert bg-success alert-success text-white" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}

    </div>

    @endforeach


    <form action="{{route('storeAvailability')}}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>BOOKING APPOINTMENT:</h3>
                    </div>

                    <div class="card-body">
                        <form class="forms-sample">

                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="times">
                                        <option value="">Choose Date</option>
                                        <option value="female">26/12/2023</option>
                                        <option value="other">27/12/2023</option>
                                        <option value="other">1/1/2024</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-sm-2 col-form-label">Time:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="times">
                                        <option value="">Choose Time</option>
                                        <option value="female">8:20 am</option>
                                        <option value="female">8:40 am</option>
                                        <option value="female">10:00 am</option>
                                        <option value="female">10:40 am</option>
                                        <option value="female">11:40 am</option>
                                        <option value="female">2:20 am</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Venue:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="times">
                                        <option value="">Choose Venue</option>
                                        <option value="female">Room 207</option>
                                        <option value="other"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Purpose:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="w3review" name="w3review" rows="4" cols="50" placeholder="Enter purpose"></textarea>
                                </div>
                            </div>
                </div>

                <div class="card-body" style="display: flex; justify-content: flex-end;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
</form>
</div>

@endsection