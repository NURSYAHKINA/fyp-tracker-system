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


    <form action="{{route('storeAppointment')}}"  method="POST" id="formNew" onsubmit="upload()">
        @csrf

        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3>BOOKING APPOINTMENT:</h3>
                    </div>

                    <div class="card-body">
                        <form class="forms-sample">
                            @if(Auth::user()->role_id == 3)
                            <div class="form-group row">
                                <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-sm-9">
                                    <select name="date" class="form-control border-primary" id="date" name ="date" required>
                                        <option value="" selected >Choose Date</option>
                                        @foreach($availabilities as $data)
                                        <option value="{{ $data }}">{{ $data }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="form-group row">
                                <label for="time" class="col-sm-2 col-form-label">Time:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="time" name ="time">
                                        <option value="">Choose Time</option>
                                        @foreach($time as $timeavailable)
                                        <option value="{{ $timeavailable }}">{{ $timeavailable }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="venue" class="col-sm-2 col-form-label">Venue:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="venue" name ="venue">
                                        <option value="">Choose Venue</option>
                                        <option value="room 207">Room 207</option>
                                        <option value="other"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Purpose:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="purpose" name="purpose" rows="4" cols="50" placeholder="Enter purpose"></textarea>
                                </div>
                            </div>
                    </div>

                    <div class="card-body" style="display: flex; justify-content: flex-end;">
                        <button type="submit" id="formNew" class="btn btn-primary">Submit</button>
                    </div>
    </form>
</div>

@endsection