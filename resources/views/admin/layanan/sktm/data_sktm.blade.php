@extends('admin.app')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Daftar Permohonan SKTM</p>
                    <a href="{{ route('tambah.pegawai') }}">
                        <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                            Buat SKTM
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
                                                Kode Permohonan
                                            </th>
                                            <th>
                                                Nama Pemohon
                                            </th>
                                            <th>
                                                Alamat
                                            </th>
                                            <th>
                                                Keperluan Dokumen
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
                                        @foreach($data_sktm as $item)
                                        <tr>
                                            <td class="py-1">
                                                {{$item->id}}
                                                <!-- <img src="../../images/faces/face1.jpg" alt="image" /> -->
                                            </td>
                                            <td>
                                                {{$item->nama_pemohon}}
                                            </td>
                                            <td>

                                                {{$item->alamat}}
                                            </td>
                                            <td>
                                            
                                                {{$item->keperluan_surat}}
                                            </td>
                                            <td>
                                                @switch($item->status_transaksi)
                                                    @case(0)
                                                        <span   style="background-color: red; padding:10px; color:azure;">Belum Diverifikasi</span>
                                                        @break

                                                    @case(1)
                                                        <span  style="background-color: yellow; padding:10px; color:black;">Sudah Disetujui</span>
                                                        @break
                                                    @case(2)
                                                        <span  style="background-color: fuchsia; padding:10px; color:black;">Sudah Ditanda tangani</span>
                                                        @break

                                                    @default
                                                        <span>Something went wrong, please try again</span>
                                                @endswitch
                                            </td>
                                            <td>
                                                <a href="{{ route('delete.pegawai', ['id' => $item->id]) }}" data-confirm-delete="true">
                                                    <button type="button" class="btn btn-sm btn-dark btn-icon-text">
                                                        <i class="ti-comment btn-icon-prepend"></i>
                                                        Komentari
                                                    </button>
                                                </a>
                                                <a href="{{ route('checklist.layanan', ['id' => $item->id_transaksi]) }}" data-confirm-delete="true">
                                                    <button type="button" class="btn btn-sm btn-success btn-icon-text">
                                                    @switch($item->status_transaksi)
                                                        @case(0)
                                                            <i class="ti-check btn-icon-prepend"></i> Verifikasi
                                                            @break
                                                        @case(1)
                                                            <i class="ti-check btn-icon-prepend"></i> Tanda Tangani
                                                            @break
                                                        @case(2)
                                                        <i class="ti-done btn-icon-prepend"></i>
                                                            @break
                                                        @default
                                                            <span>Something went wrong, please try again</span>
                                                    @endswitch
                                                        
                                                    </button>
                                                </a>

                                                <!-- {{ route('delete.pegawai', ['id' => $item->id]) }} -->
                                                <a href="{{ route('delete.pegawai', ['id' => $item->id]) }}" data-confirm-delete="true">
                                                    <button type="button" class="btn btn-sm btn-info btn-icon-text">
                                                        <i class="ti-trash btn-icon-prepend"></i>
                                                        Hapus
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
