@extends('admin.layouts.master')

@section('content')
<script src="{{ asset('frontend') }}/js/jquery.dataTables.js"></script>
<script src="{{ asset('frontend') }}/js/dataTables.bootstrap4.js"></script>
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "order": [
                [0, "asc"]
            ],
            "language": {
                search: '<i class="fa fa-search" aria-hidden="true"></i>',
                searchPlaceholder: 'Search'
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
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach($listUser as $list)
                    <tr>
                        <td style="text-align: center;">{{ $no++ }}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->name}}</td>
                        @if($list->status == 0)
                        <?php
                        $labelstatus = "Inactive";
                        $labelcolor = "badge badge-danger";
                        ?>
                        @elseif ($list->status == 1)
                        <?php
                        $labelstatus = "Active";
                        $labelcolor = "badge badge-success";
                        ?>
                        @endif
                        <td style="text-align: center;"><span class="{{ $labelcolor }}">{{ $labelstatus }}</span></td>
                        <td style="text-align: center;">
                            <form action="{{ route('deleteUser', $list->id)  }}" method="POST" class="dltForm">
                                @method('DELETE')
                                @csrf
                                <a href="{{route('viewUser', ['id' => $list->id])}}" class="mr-2"><i class="fas fa-eye font-12"></i></a>
                                @if(Auth::user()->role_id == 1)
                                <a href="{{route('editUser', ['id' => $list->id])}}" class="mr-2"><i class="fas fa-edit text-primary font-12"></i></a>
                                <button type="submit" name="submit" class="dltData"><i class="fas fa-trash-alt text-danger font-12"></i></button>
                                @endif
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