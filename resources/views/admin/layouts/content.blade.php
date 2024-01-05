@php
$user = auth()->user();
@endphp

<div class="main-content">
    <div class="container-fluid">

        <!-- All Card -->
        <div class="row clearfix justify-content-center">

            @if($user->role_id === 1 || $user->role_id === 2)
            <!-- Student Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Student</h6>
                                <h2>{{App\Models\UserRecord::where('role_id',3)->count()}}</h2>
                                <small class="text-small mt-10 d-block">Registered Student</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-thin fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Appointment Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Appointment</h6>
                                <h2>{{App\Models\UserRecord::where('role_id',3)->count()}}</h2>
                                <small class="text-small mt-10 d-block">All appointment</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-thin fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Supervisor Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Users Card -->
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Feedback</h6>
                                <h2>{{App\Models\UserRecord::where('role_id',3)->count()}}</h2>
                                <small class="text-small mt-10 d-block">All Feedback</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Supervisor Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Users Card -->
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Report</h6>
                                <h2>{{App\Models\UserRecord::where('role_id',3)->count()}}</h2>
                                <small class="text-small mt-10 d-block">All report</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-file-pdf"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix justify-content-center">
                <div class="row clearfix">
                    <!-- Empty space to the left (occupies 2 columns) -->
                    <div class="col-md-1"></div>

                    <!-- Calendar Card -->
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div id='calendar'>
                                    <!-- Your calendar content here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fetch the total number of appointment, report, student, supervisor, feedback using AJAX
            $.ajax({
                url: "{{ route('count') }}", // Replace with your route URL
                method: 'GET',
                success: function(response) {
                    // Update the HTML with the respective counts
                    $('#total-user').html('<i class="fas fa-thin fa-users"></i> ' + response.totalUsers);
                    $('#total-feedback').html('<i class="ik ik-navigation"></i> ' + response.totalFeedback);
                    $('#total-appointment').html('<i class="ik ik-calendar"></i> ' + response.totalAppointment);
                    $('#total-report').html('<i class="ik ik-clipboard"></i> ' + response.totalReport);
                },
                error: function() {
                    // Handle errors if any
                    // You might want to handle errors here appropriately
                    console.error('Error fetching data.');
                }
            });
        });
    </script>