@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-send bg-blue"></i>
                <div class="d-inline">
                    <h5>Report</h5>
                    <span>All the feedback will be generated in here</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('dashboard')}}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('ListReport') }}">Report</a></li>
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


    <form action="{{route('storeReport')}}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">CREATE REPORT:</h3>
                    </div>

                    <div class="card-body">
                        <form class="forms-sample">

                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Choose your student:</label>
                                <div class="col-sm-8">
                                <select class="form-control" id="names" name="names">
                                        <option value="" selected>Choose Student</option>
                                        @foreach($reports as $userName => $feedbacksDate)
                                        <option value="{{ $userName }}">{{ $userName }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rate_satisfaction" class="col-sm-3 col-form-label">Choose Feedback:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="rate_satisfaction" name="feedback">
                                        <option value="" selected>Choose added feedback</option>
                                        @foreach($reports as $data)
                                        <option value="{{ $data }}">{{ $data }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="selectedFeedback" class="mt-4">
                                <!-- This div will display the selected feedback -->
                            </div>
                    </div>

                    <div class="card-body" style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection