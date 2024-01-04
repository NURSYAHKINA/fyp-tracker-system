<div class="row">
        <div class="col-md-12">
            <div class="text-md-right">
                <a href="{{route('ListUser')}}"><button class="btn btn-primary float-md-right"><i class="fas fa-chevron-left"></i></button></a>
            </div>
        </div>
    </div>
    <br>

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
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form method="POST" class="form form-horizontal" action="">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fas fa-file-alt">&nbsp;&nbsp;&nbsp;</i>User Details</h4>
                                            <br>
                                            <hr>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Full Name</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" class="form-control border-primary" placeholder="Full Name" id="name" name="name" value="{{ old('name', $userInfo->name) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Email</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="email" placeholder="Email" name="email" id="email" value="{{ old('email', $userInfo->email) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Password</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input class="form-control border-primary" type="password" placeholder="Password" name="password" id="password" value="{{ old('password', $userInfo->password) }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="form-section"><i class="fas fa-calendar-alt">&nbsp;&nbsp;&nbsp;</i>User Details</h4>
                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control">User Type</label>
                                                    <div class="col-md-9 mx-auto">
                                                        <select name="user_type" class="form-control border-primary" id="role_id" disabled>
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
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!--end col-->

    </div>