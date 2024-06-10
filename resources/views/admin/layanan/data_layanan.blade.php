@extends('admin.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Daftar Pegawai</p>
                    <a href="{{ route('tambah.pegawai') }}">
                        <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                            Tambah Layanan
                            <i class="ti-file btn-icon-append"></i>
                        </button>
                    </a>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                Nama Layanan
                                            </th>
                                            <th>
                                                Kode Layanan
                                            </th>
                                            <!-- <th>
                                                NIP
                                            </th>
                                            <th>
                                                Golongan / Jabatan
                                            </th>
                                            <th>
                                                Status
                                            </th> -->
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_layanan as $item)
                                        <tr>
                                            <td class="py-1">
                                                {{$item->nama_layanan}}
                                                <!-- <img src="../../images/faces/face1.jpg" alt="image" /> -->
                                            </td>
                                            <td>
                                                {{$item->kode_layanan}}
                                            </td>
                                            
                                            <td>
                                                <a href="#">
                                                    <button type="button" class="btn  btn-sm btn-dark btn-icon-text">
                                                        Edit
                                                        <i class="ti-pencil btn-icon-append"></i>
                                                    </button>
                                                </a>
                                                <!-- {{ route('delete.pegawai', ['id' => $item->id]) }} -->
                                                <a href="{{ route('delete.pegawai', ['id' => $item->id]) }}" data-confirm-delete="true">
                                                    <button type="button" class="btn btn-sm btn-success btn-icon-text">
                                                        <i class="ti-trash btn-icon-prepend"></i>
                                                        Delete
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

<script>
    function deleteRow(id){
        // alert("jkjk"+id);
        // swal("HEY", "Message", "warning")
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
        }).then((result) => {
            if (result.isConfirmed)
                swal.fire("Done!", "It was succesfully deleted!", "success");
            else
                swal.fire("Error!", "Coudn't delet!", "error");
        });
    }
    
</script>
