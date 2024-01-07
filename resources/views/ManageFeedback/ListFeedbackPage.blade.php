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
                searchPlaceholder: 'Search Feedback'
            }
        });
    });
</script>

<div class="card">
    <div class="card-header">
        <h6>Feedback List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive justify-content-center">
            <table class="table table-bordered" id="dataTable">
            <thead class="thead-light">
                    <tr style="text-align: center;">
                        <th style="width: 10px;">No</th>
                        <th>ID Matric</th>
                        <th>Name</th>
                       
                        <th>Rating</th>
                        <th>Comment</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($FeedbackRecord as $data)
                    <tr id="row{{$data->id}}">
                        <td style="text-align: center;">{{ $no++ }}</td>
                        <td>{{ $data->id_matric }}</td>
                        <td>{{ $data->name }}</td>
                      
                        <td>{{ $data->rating }}</td>
                        <td>{{ $data->comment }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                            <i class="fas fa-eye"></i>
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
        margin: 0 auto; /* Center the table horizontally */

    }
</style>

<!-- Page level plugin JavaScript-->
<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<!-- for sweet alert fire-->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
@endsection