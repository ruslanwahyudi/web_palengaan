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
            

        </div>

        <div class="card-body">

            <div class="table-responsive text-nowrap">
            {{ $dataTable->table() }}
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


@push('scripts')
    {{ $dataTable->scripts() }}
@endpush