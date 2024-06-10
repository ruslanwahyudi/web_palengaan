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
                                <label class="col-sm-3 col-form-label">Slug</label>
                                <div class="col-sm-9">
                                    <input type="text" name="slug" value="{{ $model->slug }}" class="form-control form-control-sm
                                        @error('slug') is-invalid @enderror" id="slug" placeholder="Slug">
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="date" value="{{ $model->date !== null ? $model->date->format('Y-m-d') : '' }}" class="form-control form-control-sm
                                        @error('date') is-invalid @enderror" id="date" placeholder="date">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Content</label>
                            <textarea class="form-control" id="content" placeholder="Tulis isi konten..." rows="200" name="content">{{ $model->content }}</textarea>
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
                                                                <img src="{{ (!empty($model->image)) ? url('uploads/admin_images/articles/'.$model->image) : url('uploads/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100%" width="100%" id="uploadedAvatar" />
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
                        <div class="col-md-6"> 
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('category_id') is-invalid @enderror select2" name="category_id" id="category_id">
                                        <option></option>
                                        @foreach($category as $item)
                                        
                                        <option value="{{ $item->id }}" {{ $item->id == $model->category_id ? 'selected' : ''}} >{{ $item->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tags </label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm js-example-basic-multiple" name="tag[]" multiple="multiple">
                                        @foreach ($tags as $tagItem)
                                            @php
                                            $isSelected = '';
                                            @endphp
                                            @foreach ($model->tags as $tagItemArticle)
                                                @if ($tagItem->id == $tagItemArticle->pivot->tag_id)
                                                    @php $isSelected = 'selected'; @endphp
                                                @endif
                                            @endforeach
                                            <option value="{{ $tagItem->id }}" {{ $isSelected }} >{{ $tagItem->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" id="status" value="PUBLISHED" {{ $model->status == 'PUBLISHED' ? 'checked' : '' }}>
                                            PUBLISHED
                                        </label>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" id="status" value="DRAFT" {{ $model->status == 'DRAFT' ? 'checked' : '' }}>
                                            DRAFT

                                        </label>
                                    </div>
                                </div>
                                @error('jenis_pegawai')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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