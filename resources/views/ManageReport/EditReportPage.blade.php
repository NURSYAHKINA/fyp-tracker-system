@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" class="form form-horizontal" action="{{ route('updateReport', ['id' => $ReportInfo->id]) }}" id="updateForm">
                    @csrf
                    @method('POST')
                    <div class="form-body">
                        <h5 class="form-section"><i class="fas fa-solid fa-user-pen"></i>Report Details</h5>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-md-6 label-control">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" style="width: 150%;" class="form-control border-primary" placeholder="Full Name" id="name" name="name" value="{{ old('name', $ReportInfo->name) }}">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label class="col-md-6 label-control">Date</label>
                                        <div class="col-md-12">
                                            <input class="form-control border-primary" style="width: 150%;" type="text" placeholder="Date" name="date" id="date" value="{{ old('date', $ReportInfo->date) }}">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label class="col-md-6 label-control">Feedback</label>
                                        <div class="col-md-12">
                                            <input class="form-control border-primary" style="width: 150%;" type="text" placeholder="Feedback" name="feedback" id="feedback" value="{{ old('feedback', $ReportInfo->feedback) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" id="updateButton">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
