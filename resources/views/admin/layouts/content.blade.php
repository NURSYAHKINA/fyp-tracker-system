<div class="main-content">
    <div class="container-fluid">

        <!-- All Card -->
        <div class="row clearfix justify-content-center">

         <!-- Users Card -->
         <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total Users</h6>
                            </div>
                            <!--Display total users-->
                            <div class="icon" id="total-user">
                                <i class="fas fa-thin fa-users"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Registered Users</small>
                    </div>
                </div>
            </div>


            <!-- Feedback Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Feedback</h6>
                            </div>
                            <div class="icon" id="total-feedback">
                                <i class="ik ik-navigation"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total feedback</small>
                    </div>
                </div>
            </div>

            <!-- Appointment Card -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Appointment</h6>
                            </div>
                            <div class="icon" id="total-appointment">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Appointment</small>
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
                            </div>
                            <div class="icon" id="total-report">
                                <i class="ik ik-clipboard"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">Total Report</small>
                    </div>
                </div>
            </div>

        </div>

        <div class="row clearfix">
            <!-- Calendar Card -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div id='calendar'>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Supervision chart</h3>
                    </div>
                    <div class="card-body">
                        <div id="c3-donut-chart" id="myChart"></div>
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
                $('#total-user').html(response.totalUsers);
                $('#total-feedback').html(response.totalFeedback);
                $('#total-appointment').html(response.totalAppointment);
                $('#total-report').html(response.totalReport);

            },
            error: function() {
                // Handle errors if any
                $('#total-user').html(response.totalUsers);
                $('#total-feedback').html(response.totalFeedback);
                $('#total-appointment').html(response.totalAppointment);
                $('#total-report').html(response.totalReport);
            }
        });


    });
</script>