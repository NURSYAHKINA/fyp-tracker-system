@php
$user = auth()->user();
@endphp

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div class="main-content">
    <div class="container-fluid">


        <!-- All Card -->
        <div class="row clearfix justify-content-center">

            @if($user->role_id === 1)
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

            @if($user->role_id === 2)
            <!-- Student Card for SV-->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Student</h6>
                                <h2>{{App\Models\UserRecord::where('id', Auth::user()->id)->count()}}</h2>
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

            @if($user->role_id === 1)
            <!-- Supervisor Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Supervisor</h6>
                                <h2>{{App\Models\UserRecord::where('role_id',2)->count()}}</h2>
                                <small class="text-small mt-10 d-block">Registered Supervisor</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-user-tie"></i>
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
                                <h2>{{App\Models\AppointmentRecord::where('user_id', Auth::user()->id)->count()}}</h2>
                                <small class="text-small mt-10 d-block">All appointment</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-thin fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
            <!-- Feedback Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Users Card -->
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Feedback</h6>
                                <h2>{{App\Models\FeedbackRecord::where('id',Auth::user()->id)->count()}}</h2>
                                <small class="text-small mt-10 d-block">All Feedback</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          

            <!-- Report Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Report</h6>

                                <h2>{{App\Models\ReportRecord::where('user_id',Auth::user()->id)->count()}}</h2>

                                <small class="text-small mt-10 d-block">All report</small>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-file-pdf"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-0"></div> <!-- Occupies 2 columns -->

            <!-- Calendar Card -->
            <div class="col-md-8 d-flex justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>

            @if($user->role_id === 3)
            <!--Progress Tracker-->
            <div class="d-flex justify-content-center">
                <div class="card" style="max-width: 310px;">
                    <div class="card-body">
                        <canvas id="appointmentChart" height="100"></canvas>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the count of appointments
        var appointmentCount = <?php echo App\Models\AppointmentRecord::count(); ?>;

        // Set the minimum appointments required
        var minimumAppointments = 10;

        // Calculate the progress percentage
        var progressPercentage = (appointmentCount / minimumAppointments) * 100;

        // Initialize the Chart.js
        var ctx = document.getElementById('appointmentChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Milestones', 'Remaining'],
                datasets: [{
                    data: [appointmentCount, Math.max(0, minimumAppointments - appointmentCount)],
                    backgroundColor: [
                        '#36a2eb', // Appointments color
                        '#eaeaea' // Remaining color
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 70,
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: `Appointments Progress (${progressPercentage}%)`,
                    fontSize: 16,
                    padding: 20
                }
            }
        });
    });
</script>
