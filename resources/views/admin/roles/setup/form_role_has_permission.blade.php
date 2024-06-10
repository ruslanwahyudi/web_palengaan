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
<script type="text/javascript">
    $('#checkAllPermission').click(function(){
        if($(this).is(':checked')){
            // check all permission
            $('input[ type=checkbox ]').prop('checked', true);
        }else{
            $('input[ type=checkbox ]').prop('checked', false);
        }
    });
</script>
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form/</span> Roles in Permission</h4>
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
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-sm @error('role_id') is-invalid @enderror select2" name="role_id" id="role_id">
                                        <option></option>
                                        @foreach($roles as $item)
                                        
                                        <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="checkAllPermission" />
                                        <label class="form-check-label" for="checkAllPermission"> Permission All </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                <div class="divider divider-primary">
                                    <div class="divider-text">Permission Group</div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($permissionGroups as $permissionGroupsItem)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-4">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                                        <label class="form-check-label" for="defaultCheck1"> {{ $permissionGroupsItem->group_name }} </label>
                                    </div>
                                </div>
                                @php
                                $permissionByGroupname = App\Models\User::getPermissionByGroupname($permissionGroupsItem->group_name);
                                @endphp
                                
                                <div class="col-sm-6">
                                    @foreach ($permissionByGroupname as $permissionByGroupnameItem)
                                    
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permissionByGroupnameItem->id }}" id="defaultCheck{{ $permissionByGroupnameItem->id }}" />
                                        <label class="form-check-label" for="defaultCheck{{ $permissionByGroupnameItem->id }}" > {{ $permissionByGroupnameItem->name }} </label>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
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