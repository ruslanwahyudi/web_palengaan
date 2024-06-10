@extends('../layouts.app')
@section('js')
<script>
   $(document).ready(function () {
        // alert('a');
        $('#loading-spinner').hide();
        $('#form-ajax').submit(function (e) { 
            e.preventDefault();
            // alert($(this).serialize());
            // return;
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
                    // alert(url);
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span> Article</h4>
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
                        <!-- Isikan data berdasarkan identitas yang sebenarnya. -->
                    </p>
                    
                    <!-- <div class="divider divider-primary">
                            <div class="divider-text">Role User</div>
                        </div> -->
                   

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" value="{{ $model->title }}" class="form-control form-control-sm
                                        @error('title') is-invalid @enderror" id="title" placeholder="Judul">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" name="link_download" value="{{ $model->link_download }}" class="form-control form-control-sm
                                        @error('link_download') is-invalid @enderror" id="link_download" placeholder="Link Download">
                                    @error('link_download')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Deksipri</label>
                            <textarea class="form-control" placeholder="Tulis isi deskripsi..." rows="10" name="deskripsi">{{ $model->deskripsi }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image </label>
                                <div class="col-sm-6">
                                    
                                    <input type="file" name="image" class="form-control form-control-sm
                                        @error('image') is-invalid @enderror" id="image" >
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalScrollable" id="" class="btn btn-sm btn-success btn-icon-text">
                                        <i class="tf-icons bx bx-image"></i>{{ (!empty($model->image)) ? 'Show' : 'No Image' }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalScrollableTitle">Gambar Artikel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                                <img src="{{ (!empty($model->image)) ? url('uploads/admin_images/sakip/'.$model->image) : url('uploads/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100%" width="100%" id="uploadedAvatar" />
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                                    <span id="loading-spinner" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    {{$button}}
                                </button>
                            </div>
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