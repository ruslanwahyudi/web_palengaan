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
                    <h4 class="card-title">Change Password</h4>
                    <!-- <p class="card-description">
                        Horizontal form layout
                    </p> -->
                    <form class="forms-sample" method="POST" action="{{ route('admin.change.password.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-3 col-form-label">Old Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="old_password" class="form-control
                                @error('old_password') is-invalid @enderror" id="old_password" placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password" class="form-control
                                @error('new_password') is-invalid @enderror" id="new_password" placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password_confirmation" class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" placeholder="Confirm New Password">
                               
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <!-- <button class="btn btn-light">Batal</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection