@extends('admin.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Profile</h4>
                    <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                    <form class="forms-sample">
                        <div class="form-group">
                            <img width="100" height="100" class="rounded-circle" src="{{ (!empty($adminProfile->photo)) ? url('uploads/admin_images/'.$adminProfile->photo) : url('uploads/no_image.jpg') }}" alt="profile">
                        </div>
                        <div class="form-group">
                            <p class="card-description">
                                Nama : {{ $adminProfile->name }}
                            </p>
                            <p class="card-description">
                                Email : {{ $adminProfile->email }}
                            </p>
                            <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> -->
                        </div>
                        <!-- <i class="bi bi-twitter"></i> -->
                        <i class="ti-twitter text-primary"></i>
                        <i class="ti-facebook text-primary"></i>
                        <i class="ti-email text-primary"></i>
                        <!-- <button type="submit" class="btn btn-primary mr-2">Share Profile</button> -->
                        <!-- <button class="btn btn-light">Cancel</button> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Profile</h4>
                    <!-- <p class="card-description">
                        Horizontal form layout
                    </p> -->
                    <form class="forms-sample" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" value="{{ $adminProfile->username }}" class="form-control" id="exampleInputUsername2" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email"  value="{{ $adminProfile->email }}" class="form-control" id="exampleInputEmail2" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $adminProfile->name }}"  class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" name="photo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>    
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <button class="btn btn-light">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection