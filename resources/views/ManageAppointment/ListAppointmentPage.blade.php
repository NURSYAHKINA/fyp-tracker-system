@extends('admin.layouts.master')


@section('content')
<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script src="{{ asset('frontend') }}/js/dataTables.bootstrap4.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [
                [0, "asc"]
            ],
            "language": {
                search: '<i class="fa fa-search" aria-hidden="true"></i>',
                searchPlaceholder: 'Search Appointment'
            }
        });
    });
</script>

<div class="card">
    <div class="card-body">
        <div class="table-responsive justify-content-center">
            <table class="table table-bordered" id="dataTable">
                <thead class="thead-light">
                    <tr style="text-align: center;">
                        <th style="width: 10px;">No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Purpose</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($AppointmentRecord as $data)
                    <tr id="row{{$data->id}}">
                        <td style="text-align: center;">{{ $no++ }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->venue }}</td>
                        <td>{{ $data->purpose }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                            <a href="{{route('viewAppointment', ['id' => $data->id])}}" class="mr-2"><i class="fas fa-eye font-12"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* You can adjust these styles based on your layout */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    /* Ensure the table doesn't exceed its container */
    #dataTable {
        width: 100%;
        margin: 0 auto;
        /* Center the table horizontally */

    }
</style>

<!-- Page level plugin JavaScript-->
<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<!-- for sweet alert fire-->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endsection