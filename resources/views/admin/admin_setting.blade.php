@extends('admin.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Organisasi</h4>
                    <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                    <form class="forms-sample">
                        <div class="form-group">
                            <img width="100" height="100" class="rounded-circle" src="{{ url('uploads/'.$settings[0]->icon_app) }}" alt="profile">
                        </div>
                        <div class="form-group">
                            <p class="card-description">
                                Nama Organisasi: {{ $settings[0]->name_org }}
                            </p>
                            <p class="card-description">
                                Email : {{ $settings[0]->app_email }}
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
                    <h4 class="card-title">Update Organisasi</h4>
                    <!-- <p class="card-description">
                        Horizontal form layout
                    </p> -->
                    <form class="forms-sample" method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Aplikasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="app_name" value="{{ $adminSettings->app_name }}" class="form-control" id="exampleInputUsername2" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="app_email"  value="{{ $adminSettings->app_email }}" class="form-control" id="exampleInputEmail2" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Nama Organisasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_org" value="{{ $adminSettings->name_org }}"  class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Alamat Organisasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="address_org" value="{{ $adminSettings->address_org }}"  class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Telp Organisasi</label>
                            <div class="col-sm-9">
                                <input type="text" name="phone_org" value="{{ $adminSettings->phone_org }}"  class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Gambar Logo</label>
                            <div class="col-sm-9">
                                <input type="file" name="logo" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
                                    <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Gambar Faveicon</label>
                            <div class="col-sm-9">
                                <input type="file" name="faveicon" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
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