@extends('../layouts/app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="row">

        </div>
        <h5 class="card-header">Daftar Pegawai</h5>

        <div class="row" style="margin: 5px;">
            <div class="col-md-6">
                <div class="form-group row">
                    <span>
                        <a href="{{ route('tambah.pegawai') }}">
                            <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                Tambah Pegawai
                                <i class="tf-icons bx bx-plus"></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route' => 'daftar.pegawai', 'method' => 'GET']) !!}
                <div class="form-group row">
                    <div class="input-group">

                        <input type="text" name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Masukkan Kata Kunci" aria-label="Recipient's username" aria-describedby="button-addon2" />
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>

                    </div>
                </div>
                {!! Form::close() !!}
            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>
                                Nama Pegawai
                            </th>
                            <th>
                                NIK
                            </th>
                            <th>
                                NIP
                            </th>
                            <th>
                                Golongan / Jabatan
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftarPegawai as $item)
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li
                                        data-bs-toggle="tooltip"
                                        data-popup="tooltip-custom"
                                        data-bs-placement="top"
                                        class="avatar avatar-xs pull-up"
                                        title="Lilian Fuller"
                                    >
                                        <!-- <img src="{{ asset('sneat') }}/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" /> -->
                                        <img src="{{ (!empty($item->photo)) ? url('uploads/admin_images/'.$item->photo) : url('uploads/no_image.jpg') }}"  alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td class="py-1">
                                
                                {{$item->name}}  
                                <!-- <img src="../../images/faces/face1.jpg" alt="image" /> -->
                            </td>
                            <td>
                                {{$item->nik}}
                            </td>
                            <td>

                                <span class="nip">{{$item->nip}}</span> 
                            </td>
                            <td>
                                {{$item->golongan}} / {{$item->jabatan}}
                            </td>
                            <td>
                                <span class="badge {{ ($item->jenis_pegawai === 'ASN') ? 'bg-label-primary' : 'bg-label-warning' }} me-1">
                                    {{$item->jenis_pegawai}}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('ubah.pegawai', $item->id) }}">
                                    <button type="button" class="btn  btn-sm btn-dark btn-icon-text">

                                        <i class="tf-icons bx bx-pencil"></i> Edit
                                    </button>
                                </a>

                                <a href="{{ route('hapus.pegawai', $item->id) }}" id="delete">
                                    <button type="submit" id="delete" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-trash"></i>Hapus
                                    </button>
                                </a>

                                <a href="{{ route('detail.pegawai', $item->id) }}">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                        <i class="tf-icons bx bx-show"></i>Detail
                                    </button>
                                </a>


                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    {{ $daftarPegawai->links() }}
                </table>

            </div>

        </div>
    </div>
    <!--/ Bordered Table -->
</div>

<script type="text/javascript">
    function confirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x) {
            return true;
        } else {

            event.preventDefault();
            return false;
        }

    }
</script>
@endsection