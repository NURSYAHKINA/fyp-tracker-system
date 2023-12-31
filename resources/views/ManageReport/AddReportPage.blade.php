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
                    <li class="breadcrumb-item"><a href="{{ route('listReport') }}">Report</a></li>
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
                        <h3 class="mb-0">CREATE REPORT:</h3>
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
                                <label for="rate_satisfaction" class="col-sm-3 col-form-label">Choose Feedback:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="rate_satisfaction">
                                        <option value="">---------------------------------</option>
                                        <option value="5">All the updated report has followed the rubric</option>
                                        <option value="4">All the updated report has followed the rubric 2</option>
                                        <option value="3">All the updated report has followed the rubric 3</option>
                                        <option value="2">All the updated report has followed the rubric 4</option>
                                        <option value="1">All the updated report has followed the rubric 5</option>
                                    </select>
                                </div>
                            </div>

                            <!-- New div to display selected feedback -->
                           <!-- New div to display selected feedback -->
                           <div class="form-group row">
                                <label for="selected_feedback" class="col-sm-3 col-form-label">Selected Feedback:</label>
                                <div class="col-sm-8">
                                    <ul id="feedbackList"></ul>
                                </div>
                            </div>

                    </div>

                    <div class="card-body" style="display: flex; justify-content: flex-end;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
    </form>
</div>

<!-- JavaScript for displaying selected feedback -->
<script>
    var selectElement = document.getElementById('rate_satisfaction');
    var feedbackList = document.getElementById('feedbackList');

    selectElement.addEventListener('change', function() {
        var selectedValue = selectElement.options[selectElement.selectedIndex].text;
        var listItem = document.createElement('li');
        listItem.textContent = selectedValue;

        var deleteButton = document.createElement('button');
        deleteButton.textContent = 'Remove';
        deleteButton.style.padding = '2px 8px';
        deleteButton.style.marginLeft = '10px';
        deleteButton.style.fontSize = '12px';
        deleteButton.style.border = '2px solid #ccc';
        deleteButton.onclick = function() {
            listItem.remove();
        };

        listItem.appendChild(deleteButton);
        feedbackList.appendChild(listItem);
    });
</script>




@endsection