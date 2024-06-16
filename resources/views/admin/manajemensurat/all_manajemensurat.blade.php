@extends('../layouts/app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="row">

        </div>
        <h5 class="card-header">Daftar {{$page['title']}}</h5>

        <div class="row" style="margin: 5px; ">
            <div class="col-md-4" >
                <div class="form-group row mt-1 mb-1">
                    <span>
                        <a href="{{ route('add.manajemensurat') }}">
                            <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                Tambah {{$page['model']}}
                                <i class="tf-icons bx bx-plus"></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-8" >
                {!! Form::open(['route' => 'all.surat_tugas', 'method' => 'GET']) !!}
                <div class="form-group row  mt-1 mb-1">
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
                            <th>
                                Tanggal Kegiatan
                            </th>
                            <th>
                                Perihal
                            </th>
                            
                            <th>
                                Pengirim
                            </th>
                            
                            <th>
                                Disposisi Ke
                            </th>
                            <th>Lampiran</th>
                            <th>status</th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>
                            {{$item->tanggal_surat}}
                            </td>
                            <td class="py-1">
                                {{$item->perihal}}  
                            </td>
                            <td>
                            {{$item->pengirim}}
                            </td>
                            <td>
                            {{ $item->disposisi_ke !== '' ? $item->user->name : 'Camat Palengaan'}}
                            </td>
                            <td>

                                <span><a target="_blank" href="{{ asset('uploads/admin_images/surat_masuk/') }}/{{$item->lampiran}}">Lihat Lampiran</a></span> 
                            </td>
                            <td>
                                <span class="badge {{ ($item->status === 'verified') ? 'bg-label-primary' : 'bg-label-warning' }} me-1">
                                    {{$item->status}}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('edit.manajemensurat', $item->id) }}">
                                    <button type="button" class="btn  btn-sm btn-dark btn-icon-text">

                                        <i class="tf-icons bx bx-pencil"></i> Edit
                                    </button>
                                </a>

                                <a href="{{ route('delete.manajemensurat', $item->id) }}" id="delete">
                                    <button type="submit" id="delete" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-trash"></i>Hapus
                                    </button>
                                </a>

                                <!-- <a target="_blank" href="{{ route('cetak.surat_tugas', $item->id) }}">
                                    <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                        <i class="tf-icons bx bx-printer"></i> Cetak
                                    </button>
                                </a> -->


                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                    {{ $data->links() }}
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