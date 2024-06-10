@extends('../layouts.app')
@section('js')
<script>
   $(document).ready(function () {
        // alert('a');
        $('#loading-spinner').hide();
        $('#form-ajax').submit(function (e) { 
            e.preventDefault();
            // alert($(this).serialize());
            var data = new FormData(this);
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: data,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend : function(){
                    $('#loading-spinner').show();
                    $("#loading-overlay").removeClass("d-none");
                },
                success: function (response) {
                    // alert('data berhasil disimpan');
                    toastr.success(response.message);
                    $('#alert-message').removeClass('d-none');
                    $('#alert-message').addClass('alert-primary');
                    $('#alert-message').html(response.message);
                    $("#alert-message").fadeTo(2000, 500).slideUp(500, function(){
                        $("#alert-message").slideUp(500);
                    });
                    $('#loading-spinner').hide();
                    $("#loading-overlay").addClass("d-none");
                },
                error:function(xhr,status,error){
                    // toastr.success(xhr.responseJSON.message);
                    $('#alert-message').removeClass('d-none');
                    $('#alert-message').addClass('alert-danger');
                    $('#alert-message').html(xhr.responseJSON.message);
                    
                    $('#loading-spinner').hide();
                    $("#loading-overlay").addClass("d-none");
                    
                },
            });
            return;
        });
   }); 
</script>
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span> Pegawai</h4>
    <div class="alert d-none" role="alert" id="alert-message">
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <!-- <h4 class="card-title">Input Data Pegawai</h4> -->
                    {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true, 'id' => 'form-ajax']) !!}
                    <!-- <form class="form-sample" method="$data['method']" action="$data['route']"> -->
                    {{ csrf_field() }}
                    <p class="card-description">
                        Isikan data berdasarkan identitas yang sebenarnya.
                    </p>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pegawai</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('pegawai_id') is-invalid @enderror select2" name="pegawai_id" id="pegawai_id">
                                        <option></option>
                                        @foreach($pegawai as $pegawaiItem)
                                            <option value="{{ $pegawaiItem->id }}" {{ $model->pegawai_id == $pegawaiItem->id ? 'selected' : ''}} >{{ $pegawaiItem->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pegawai_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal" value="{{ $model->tanggal !== null ? $model->tanggal : '' }}" class="form-control form-control-sm
                                        @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="date">
                                    @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Tulis isi keterangan tugas..." rows="5" name="keterangan">{{ $model->keterangan }}</textarea>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="divider divider-primary">
                        <div class="divider-text">Bukti Tugas</div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('file_bukti') is-invalid @enderror"  name="file_bukti" type="file" id="file_bukti" />
                                    
                                    @error('file_bukti')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <!-- <label class="col-sm-3 col-form-label">Password</label> -->
                                <div class="col-sm-3">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ (!empty($model->file_bukti)) ? url('uploads/admin_images/surat_tugas/'.$model->file_bukti) : url('uploads/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalScrollable" id="" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-image"></i>{{ (!empty($model->file_bukti)) ? ' Zoom' : ' No Image' }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalScrollableTitle">Gambar Bukti Tugas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                                <img src="{{ (!empty($model->file_bukti)) ? url('uploads/admin_images/surat_tugas/'.$model->file_bukti) : url('uploads/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100%" width="100%" id="uploadedAvatar" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                    <div class="row"> 
                        <div class="col-md-6">
                            <button class="btn btn-primary" type="submit">
                                <span id="loading-spinner" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                {{$button}}
                            </button>
                            <a href="{{ route('all.surat_tugas') }}">
                                <button class="btn btn-success" type="button">
                                    Kembali
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary mr-2">{{$button}}</button> -->
                    
                    <!-- <button class="btn btn-light">Batal</button> -->
                    <!-- </form> -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection