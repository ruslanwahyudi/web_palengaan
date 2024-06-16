@extends('../layouts.app')
@section('js')
<script>
    $(document).ready(function() {
        // alert('a');
        $('#loading-spinner').hide();
        $('#form-ajax').submit(function(e) {
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
                beforeSend: function() {
                    $('#loading-spinner').show();
                    $("#loading-overlay").removeClass("d-none");
                },
                success: function(response) {
                    // alert('data berhasil disimpan');
                    toastr.success(response.message);
                    $('#alert-message').removeClass('d-none');
                    $('#alert-message').addClass('alert-primary');
                    $('#alert-message').html(response.message);
                    $("#alert-message").fadeTo(2000, 500).slideUp(500, function() {
                        $("#alert-message").slideUp(500);
                    });
                    $('#loading-spinner').hide();
                    $("#loading-overlay").addClass("d-none");
                },
                error: function(xhr, status, error) {
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span> Manejemen Surat</h4>
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
                        Isikan data yang sebenarnya.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="no_surat" value="{{ $model->no_surat }}" class="form-control form-control-sm
                                    @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="No Surat">
                                    @error('no_surat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Perihal Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="perihal" value="{{ $model->perihal }}" class="form-control form-control-sm
                                    @error('perihal') is-invalid @enderror" id="perihal" placeholder="Perihal">
                                    @error('perihal')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pengirim</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pengirim" value="{{ $model->pengirim }}" class="form-control form-control-sm
                                    @error('pengirim') is-invalid @enderror" id="pengirim" placeholder="pengirim">
                                    @error('pengirim')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal_surat" value="{{ $model->tanggal_surat !== null ? $model->tanggal_surat : '' }}" class="form-control form-control-sm
                                        @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" placeholder="tanggal_surat">
                                    @error('tanggal_surat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Surat</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('jenis_surat') is-invalid @enderror select2" name="jenis_surat" id="jenis_surat">
                                        <option></option>
                                        <option value="UNDANGAN" {{ $model->jenis_surat == 'UNDANGAN' ? 'selected' : ''}}>UNDANGAN</option>
                                        <option value="PEMBERITAHUAN" {{ $model->jenis_surat == 'PEMBERITAHUAN' ? 'selected' : ''}}>PEMBERITAHUAN</option>
                                    </select>
                                    @error('jenis_surat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Disposisi Ke</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('disposisi_ke') is-invalid @enderror select2" name="disposisi_ke" id="disposisi_ke">
                                        <option></option>
                                        @foreach($pegawai as $pegawaiItem)
                                        <option value="{{ $pegawaiItem->id }}" {{ $model->disposisi_ke == $pegawaiItem->id ? 'selected' : ''}}>{{ $pegawaiItem->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('disposisi_ke')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="divider divider-primary">
                        <div class="divider-text">Attachment File</div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lampiran File</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('lampiran') is-invalid @enderror" name="lampiran" type="file" id="lampiran" />

                                    @error('lampiran')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group row">

                                <a href="  {{ (!empty($model->lampiran)) ? asset('uploads/admin_images/surat_masuk').'/'.$model->lampiran : '#' }} " target="_blank">
                                    <button type="button" id="" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-file"></i>{{ (!empty($model->lampiran)) ? ' Lihat' : ' No File' }}
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="divider divider-primary">
                        <div class="divider-text"></div>
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