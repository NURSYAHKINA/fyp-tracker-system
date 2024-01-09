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
                searchPlaceholder: 'Search Report'
            }
        });
    });
</script>

<div class="card">
    <div class="card-header">
        <h6>Report List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive justify-content-center">
            <table class="table table-bordered" id="dataTable">
            <thead class="thead-light">
                    <tr style="text-align: center;">
                        <th style="width: 10px;">No</th>
                      
                        <th>Name</th>
                        <th>Date</th>
                        <th>Feedback</th>
                        <th style="width: 100px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach($ReportRecord as $reports)
                    <tr id="row{{$reports->id}}">
                        <td style="text-align: center;">{{ $no++ }}</td>
                       
                        <td>{{ $reports->name }}</td>
                        <td>{{ $reports->date }}</td>
                        <td>{{ $reports->feedback }}</td>
                        <td class="text-center">
                        <form action="{{ route('deleteReport', $reports->id)  }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('viewReport',['id' => $reports->id])}}" class="mr-3"><i class="fas fa-eye font-14"></i></a>
                                <a href="{{route('editReport',['id' => $reports->id])}}" class="mr-2"><i class="fas fa-edit text-primary font-14"></i></a>
                                <button type="submit" name="submit" style="border: none; background: none;"><i class="fas fa-trash-alt text-danger font-14"></i></button>

                            </form>
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