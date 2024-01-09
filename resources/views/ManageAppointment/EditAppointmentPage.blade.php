@php
$user = auth()->user();
@endphp

@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" class="form form-horizontal" action="{{route('updateUser', ['id' => $userInfo->id])}}" id="updateForm">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <h5 class="form-section"><i class="fas fa-solid fa-user-pen"></i>Users Details</h5>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-header border-bottom text-center">
                                    <button type="button" class="mb-4 btn btn-sm btn-pill btn-outline-primary mr-2" data-toggle="modal" data-target="#modalProfile">
                                        <i class="material-icons mr-1"></i>Change Picture</button>
                                    <button type="button" class="mb-4 btn btn-sm btn-pill btn-outline-primary mr-2" data-toggle="modal" data-target="#modalPassword">
                                        <i class="material-icons mr-1"></i>Change Password</button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" style="width: 150%;" class="form-control border-primary" placeholder="Full Name" id="name" name="name" value="{{ old('name', $userInfo->name) }}">
                                            </div>
                                        </div>

                                        @if($user->role_id === 2 || $user->role_id === 3)
                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">ID Matric</label>
                                            <div class="col-md-12">
                                                <input class="form-control border-primary" style="width: 150%;" type="text" placeholder="ID Matric" name="id_matric" id="id_matric" value="{{ old('id_matric', $userInfo->id_matric) }}">
                                            </div>
                                        </div>
                                        @endif

                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">Email</label>
                                            <div class="col-md-12">
                                                <input class="form-control border-primary" style="width: 150%;" type="email" placeholder="Email" name="email" id="email" value="{{ old('email', $userInfo->email) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">User Type</label>
                                            <div class="col-md-12">
                                                <select name="role_id" style="width: 150%;" class="form-control border-primary" id="role_id" disabled>
                                                    <option value="1" {{ old('role_id', $userInfo->role_id) == '1' ? 'selected' : '' }}>Coordinator</option>
                                                    <option value="2" {{ old('role_id', $userInfo->role_id) == '2' ? 'selected' : '' }}>Supervisor</option>
                                                    <option value="3" {{ old('role_id', $userInfo->role_id) == '3' ? 'selected' : '' }}>Student</option>
                                                </select>
                                            </div>
                                        </div>

                                        @if($user->role_id === 3)
                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">User Majoring</label>
                                            <div class="col-md-12">
                                                <select name="user_majoring" style="width: 150%;" class="form-control border-primary" id="user_majoring">
                                                    <option value="dcs" {{ old('user_majoring', $userInfo->user_majoring) == 'dcs' ? 'selected' : '' }}>DCS</option>
                                                    <option value="bcs" {{ old('user_majoring', $userInfo->user_majoring) == 'bcs' ? 'selected' : '' }}>BCS</option>
                                                    <option value="bcn" {{ old('user_majoring', $userInfo->user_majoring) == 'bcn' ? 'selected' : '' }}>BCN</option>
                                                    <option value="bcg" {{ old('user_majoring', $userInfo->user_majoring) == 'bcg' ? 'selected' : '' }}>BCG</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-6 label-control">User Category</label>
                                            <div class="col-md-12">
                                                <select name="user_category" style="width: 150%;" class="form-control border-primary" id="user_category">
                                                    <option value="pta1" {{ old('user_category', $userInfo->user_category) == 'pta1' ? 'selected' : '' }}>PTA 1</option>
                                                    <option value="pta2" {{ old('user_category', $userInfo->user_category) == 'pta2' ? 'selected' : '' }}>PTA 2</option>
                                                    <option value="psm1" {{ old('user_category', $userInfo->user_category) == 'psm1' ? 'selected' : '' }}>PSM 1</option>
                                                    <option value="psm2" {{ old('user_category', $userInfo->user_category) == 'psm2' ? 'selected' : '' }}>PSM 2</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="sv_id" class="col-md-6 label-control">Choose SV</label>
                                            <div class="col-md-12">
                                                <select name="sv_id" style="width: 150%;" class="form-control border-primary" id="sv_id">
                                                    <option value="">Select SV</option>
                                                    @foreach($supervisors as $supervisor)
                                                    <option value="{{ $supervisor->id }}" {{ old('sv_id', $userInfo->id) == $supervisor->id ? 'selected' : '' }}>
                                                        {{ $supervisor->name }} <!-- Assuming 'name' is the field representing supervisor names -->
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" id="updateButton">Update</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Change profile-->
<div class="modal fade" id="modalProfile" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Profile Image</h4>
            </div>
            <div class="card-body">

                <form method="POST" enctype="multipart/form-data" action="{{route('updateAvatar')}}" onsubmit="upload()">
                    @csrf
                    @method('POST')
                    <div class="form-group row">


                        <div class="col-md-12">
                            <input type="file" class="form-control" name="avatar" id="avatarFile" aria-describedby="fileHelp" required>
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">
                        Upload
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection