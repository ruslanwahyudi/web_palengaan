@extends('../layouts/app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="row">

        </div>
        <h5 class="card-header">Data {{ $page['title'] }}</h5>
    
        <div class="row" style="margin: 5px;">
            <div class="col-md-6">
                <div class="form-group row">
                    <span>
                        <a href="{{ route('add.sakip') }}">
                            <button type="button" class="btn btn-sm btn-primary btn-icon-text">
                                Tambah {{ $page['model'] }}
                                <i class="tf-icons bx bx-plus"></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                {!! Form::open(['route' => 'data.sakip', 'method' => 'GET']) !!}
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
                            <th>
                                Judul
                            </th>
                            <th>
                                Link
                            </th>
                            <th>
                                Deskripsi
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td class="py-1">
                                {{$item->title}}  
                            </td>
                            <td class="py-1">
                                <a href="{{$item->link_download}}" target="_blank"><i class="tf-icons bx bx-file"></i>Lihat</a>
                            </td>
                            <td class="py-1">
                                {{$item->deskripsi}}  
                            </td>
                            
                            <td>
                                <a href="{{ route('edit.sakip', $item->id) }}">
                                    <button type="button" class="btn  btn-sm btn-dark btn-icon-text">

                                        <i class="tf-icons bx bx-pencil"></i> Edit
                                    </button>
                                </a>

                                <a href="{{ route('delete.sakip', $item->id) }}" id="delete">
                                    <button type="submit" id="delete" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-trash"></i>Hapus
                                    </button>
                                </a>
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