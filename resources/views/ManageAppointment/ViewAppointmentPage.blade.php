@include('admin.layouts.master')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-md-right">
            <a href="{{route('ListAppointment')}}"><button class="btn btn-primary float-md-right"><i class="fas fa-chevron-left"></i></button></a>
        </div>
    </div>
</div>
<br>

<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--begin::Tab-->
                    <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                        <!--begin::Row-->
                        <div class="card-header">
                            <h1 class="card-title"><i class="fas fa-user">&nbsp;&nbsp;&nbsp;</i>Appointment Information</h1>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form method="POST" class="form form-horizontal" action="">
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-file-alt">&nbsp;&nbsp;&nbsp;</i>Appointment Details</h4>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">Date</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <input type="text" class="form-control border-primary" placeholder="Date" id="date" name="date" value="{{ old('date', $appointmentInfo->date) }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Time</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="time" placeholder="time" name="time" id="time" value="{{ old('time', $appointmentInfo->time) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Venue</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="venue" placeholder="venue" name="venue" id="venue" value="{{ old('venue', $appointmentInfo->venue) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Purpose</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="purpose" placeholder="purpose" name="purpose" id="purpose" value="{{ old('purpose', $appointmentInfo->purpose) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end card-body-->
        </div><!--end card-->
    </div> <!--end col-->

</div>

@endsection