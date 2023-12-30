<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Supervisor</h6>
                                <h2>1,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user-check"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">6% higher than last month</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Student</h6>
                                <h2>41,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">61% higher than last month</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Feedback</h6>
                                <h2>410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-send"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Events</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Report</h6>
                                <h2>41,410</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-clipboard"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Comments</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <h3 class="card-title">Calendar</h3>
                                <div id="calendar" style="width:100%; height:350px"></div>
                            </div>
                            <div class="modal" id="editEvent" tabindex="-1" role="dialog" aria-labelledby="editEventLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form class="editEventForm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editEventLabel">Edit Event</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="editEname">Event Title</label>
                                                <input type="text" class="form-control" id="editEname" name="editEname" placeholder="Please enter event title">
                                            </div>
                                            <div class="form-group">
                                                <label for="editStarts">Start</label>
                                                <input type="text" class="form-control datetimepicker-input" id="editStarts" name="editStarts" data-toggle="datetimepicker" data-target="#editStarts">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-danger delete-event" type="submit">Delete</button>
                                            <button class="btn btn-success save-event" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="min-height: 422px;">
                    <div class="card-header">
                        <h3>Donut chart</h3>
                    </div>
                    <div class="card-body">
                        <div id="c3-donut-chart"></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card" style="min-height: 422px;">
                <div class="card-header">
                    <h3>Timeline</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body timeline">
                    <div class="header bg-theme" style="background-image: url('img/placeholder/placeimg_400_200_nature.jpg')">
                        <div class="color-overlay d-flex align-items-center">
                            <div class="day-number">8</div>
                            <div class="date-right">
                                <div class="day-name">Monday</div>
                                <div class="month">February 2018</div>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="bullet bg-pink"></div>
                            <div class="time">11am</div>
                            <div class="desc">
                                <h3>Attendance</h3>
                                <h4>Computer Class</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-green"></div>
                            <div class="time">12pm</div>
                            <div class="desc">
                                <h3>Design Team</h3>
                                <h4>Hangouts</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-orange"></div>
                            <div class="time">2pm</div>
                            <div class="desc">
                                <h3>Finish</h3>
                                <h4>Go to Home</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>