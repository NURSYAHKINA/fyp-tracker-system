@extends('admin.layouts.master')

<div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!--begin::Tab-->
                        <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                            <!--begin::Row-->
                            <div class="card-header">
                                <h1 class="card-title"><i class="fas fa-user">&nbsp;&nbsp;&nbsp;</i>User Information</h1>
                            </div>
                            <hr>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form method="POST" class="form form-horizontal" action="{{route('updateUser' , ['id' => $userInfo->id])}}" id="updateForm">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fas fa-file-alt">&nbsp;&nbsp;&nbsp;</i>Users Details</h4>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Full Name</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" class="form-control border-primary" placeholder="Full Name" id="name" name="name" value="{{ old('name', $userInfo->name) }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Email</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="email" placeholder="Email" name="email" id="email" value="{{ old('email', $userInfo->email) }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Password</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="password" placeholder="Password" name="password" id="password" value="{{ old('password', $userInfo->password) }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">User Type</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="role_id" class="form-control border-primary" id="role_id"     >
                                                            <option value="1" {{ old('role_id', $userInfo->role_id) == '1' ? 'selected' : '' }}>Coordinator</option>
                                                            <option value="2" {{ old('role_id', $userInfo->role_id) == '2' ? 'selected' : '' }}>Supervisor</option>
                                                            <option value="3" {{ old('role_id', $userInfo->role_id) == '3' ? 'selected' : '' }}>Student</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr>
                                        <br>
                                        <div class="form-actions text-center">
                                            <button class="btn btn-primary float-md-right" id="updateButton">Update</button>
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

    <script>
    $(document).ready(function() {
        $("#updateButton").click(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Manually trigger form validation
            if ($("#updateForm")[0].checkValidity()) {
                // Show SweetAlert dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You want to update this data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6777ef',
                    cancelButtonColor: '$secondary',
                    confirmButtonText: 'Yes, update it!',
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Show success message
                        Swal.fire({
                            title: 'Success!',
                            text: 'Your data has been updated.',
                            icon: 'success',
                            showConfirmButton: true // Show the "OK" button
                        }).then(() => {
                            // Submit the form here
                            $("#updateForm").submit();
                        });
                    }
                });
            } else {
                // Handle invalid form
                Swal.fire({
                    title: 'Invalid Form',
                    text: 'Please fill in all the required fields.',
                    icon: 'error',
                    showConfirmButton: true, // Show the "OK" button
                    confirmButtonColor: '#6777ef',
                });
            }
        });
    });
</script>
