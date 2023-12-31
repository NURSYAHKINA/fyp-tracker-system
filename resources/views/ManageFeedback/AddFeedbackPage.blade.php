@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-send bg-blue"></i>
                <div class="d-inline">
                    <h5>Feedback</h5>
                    <span>Share any feedback/suggestion to your students</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('dashboard')}}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('listFeedback') }}">Feedback</a></li>
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">GIVE YOUR FEEDBACK:</h3>
                        <span class="alert alert-warning feedback-reminder mb-0"><strong>Reminder:</strong> All the feedback will be generated in the REPORT</span>
                    </div>

                    <div class="card-body">
                        <form class="forms-sample">

                            <div class="form-group row">
                                <label for="date" class="col-sm-3 col-form-label">Choose your student:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="times">
                                        <option value="">Choose Student</option>
                                        <option value="female">NURSYAHKINA BINTI OTHAMAN</option>
                                        <option value="other">MUHAMMAD ARIF BIN MAT DAUD</option>
                                        <option value="other">MUHAMMAD TAUFIQ BIN JASLAN</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rate_satisfaction" class="col-sm-3 col-form-label">Rate satisfaction:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="rate_satisfaction">
                                        <option value="">Select satisfaction level</option>
                                        <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733; (Highly Satisfied)</option>
                                        <option value="4">&#9733;&#9733;&#9733;&#9733;&#9734; (Satisfied)</option>
                                        <option value="3">&#9733;&#9733;&#9733;&#9734;&#9734; (Neutral)</option>
                                        <option value="2">&#9733;&#9733;&#9734;&#9734;&#9734; (Dissatisfied)</option>
                                        <option value="1">&#9733;&#9734;&#9734;&#9734;&#9734; (Highly Dissatisfied)</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Give your feedback/suggestion:</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="w3review" name="w3review" rows="4" cols="50" placeholder=""></textarea>
                                </div>
                            </div>
                    </div>

                    <div class="card-body" style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
    </form>
</div>

@endsection