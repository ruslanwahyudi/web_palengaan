@extends('../layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Detail/</span> Pegawai</h4>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img card-img-left" src="{{ (!empty($photo)) ? url('uploads/admin_images/'.$photo) : url('uploads/no_image.jpg') }}" alt="Card image" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$name}} - {{$nik}} - {{$nip}}</h5>
                                <table>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{$email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>{{$username}}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{$address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Golongan/ Jabatan</td>
                                        <td>:</td>
                                        <td>{{$golongan}} / {{$jabatan}}</td>
                                    </tr>
                                    <tr>
                                        <td>Golongan/ Jabatan</td>
                                        <td>:</td>
                                        <td>{{$golongan}} / {{$jabatan}}</td>
                                    </tr>
                                </table>
                                <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                <a href="{{ route('daftar.pegawai') }}">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                        <i class="tf-icons bx bx-chevrons-left"></i>Kembali
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection