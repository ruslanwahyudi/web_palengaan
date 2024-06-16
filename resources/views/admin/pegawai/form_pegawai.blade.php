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
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control form-control-sm
                                        @error('name') is-invalid @enderror" value="{{$model->name}}" id="name" placeholder="Nama Pegawai">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="{{$model->email}}" class="form-control form-control-sm
                                            @error('email') is-invalid @enderror" id="email" placeholder="Email Pegawai">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" value="{{$model->username}}" class="form-control form-control-sm
                                        @error('username') is-invalid @enderror" id="username" autocomplete="username" placeholder="Username">
                                    @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jenis Pegawai</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input @error('jenis_pegawai') is-invalid @enderror" name="jenis_pegawai" id="jenis_pegawai" value="ASN" {{ $model->jenis_pegawai == 'ASN' ? 'checked' : '' }}>
                                            ASN
                                        </label>

                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input @error('jenis_pegawai') is-invalid @enderror" name="jenis_pegawai" id="jenis_pegawai" value="NON-ASN" {{ $model->jenis_pegawai == 'NON-ASN' ? 'checked' : '' }}>
                                            NON-ASN

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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip" value="{{$model->nip}}" class="form-control form-control-sm nip
                                        @error('nip') is-invalid @enderror" id="nip" placeholder="NIP">
                                    @error('nip')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="nik" name="nik" value="{{$model->nik}}" class="form-control form-control-sm
                                            @error('nik') is-invalid @enderror" id="nik" placeholder="NIK">
                                    @error('nik')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Golongan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="golongan" value="{{$model->golongan}}" class="form-control form-control-sm
                                        @error('golongan') is-invalid @enderror" id="golongan" placeholder="Golongan">
                                    @error('golongan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="jabatan" name="jabatan" value="{{$model->jabatan}}" class="form-control form-control-sm
                                            @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="jabatan">
                                    @error('jabatan')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="divider divider-primary">
                            <div class="divider-text">Role User</div>
                        </div> -->
                    <div class="divider divider-primary">
                        <div class="divider-text">Role and Authentication</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organisasi</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('org_id') is-invalid @enderror select2" name="org_id" id="org_id">
                                        <option></option>
                                        @foreach($organisasi as $organisasiItem)
                                            <option value="{{ $organisasiItem->id }}" {{ $model->org_id == $organisasiItem->id ? 'selected' : ''}} >{{ $organisasiItem->name_organisasi }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('org_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Level User</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('role') is-invalid @enderror select2" name="role" id="role">
                                        <option></option>
                                        <option value="admin" {{ $model->role == 'admin' ? 'selected' : ''}} >Administrator</option>
                                        <option value="operator" {{ $model->role == 'operator' ? 'selected' : ''}}>Operator</option>
                                        <option value="user" {{ $model->role == 'user' ? 'selected' : ''}}>User</option>
                                       
                                    </select>
                                    @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Data Atasan</label>
                                <div class="col-sm-9">
                                    <select class="form-select form-select-sm @error('parent_id') is-invalid @enderror select2" name="parent_id" id="parent_id">
                                        <option></option>
                                        @foreach($user as $userItem)
                                            <option value="{{ $userItem->id }}" {{ $model->parent_id == $userItem->id ? 'selected' : ''}} >{{ $userItem->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('parent_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control form-control-sm
                                        @error('password') is-invalid @enderror" id="password" autocomplete="new-password" placeholder="Password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider divider-primary">
                        <div class="divider-text">Image Profile</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file" id="formFile" />
                                    
                                    @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <!-- <label class="col-sm-3 col-form-label">Password</label> -->
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ (!empty($model->photo)) ? url('uploads/admin_images/'.$model->photo) : url('uploads/no_image.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                
                                </div>
                                
                            </div>
                        </div>

                    </div>

                    <!-- <button type="submit" class="btn btn-primary mr-2">{{$button}}</button> -->
                    <button class="btn btn-primary" type="submit">
                        <span id="loading-spinner" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        {{$button}}
                    </button>
                    <!-- <button class="btn btn-light">Batal</button> -->
                    <!-- </form> -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection