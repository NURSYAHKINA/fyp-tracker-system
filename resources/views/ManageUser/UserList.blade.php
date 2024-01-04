@extends('admin.layouts.master')

<div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="table">
                                <thead class="thead-light">
                                    <tr>
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
                                        <td>{{ $no++ }}</td>
                                        <td>{{$list->name}}</td>
                                        <td>{{$list->email}}</td>
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
                                        <td><span class="{{ $labelcolor }}">{{ $labelstatus }}</span></td>
                                        <td>
                                            <form action="{{ route('deleteUser', $list->id)  }}" method="POST" class="dltForm">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{route('viewUser', ['id' => $list->id])}}" class="mr-2"><i class="fas fa-eye font-14"></i></a>
                                                @if(Auth::user()->role_id == 1)
                                                <a href="{{route('editUser', ['id' => $list->id])}}" class="mr-2"><i class="fas fa-edit text-primary font-14"></i></a>
                                                <button type="submit" name="submit" class="dltData"><i class="fas fa-trash-alt text-danger font-14"></i></button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div>