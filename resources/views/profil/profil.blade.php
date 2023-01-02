<!DOCTYPE html>
<html lang="en">
@include('Template.head')
<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    
    {{-- sidebar --}}
    @include('Template.sidebar')
    {{-- end sidebar --}}
    
    <main class="main-content position-relative border-radius-lg ">
    
    <!-- Navbar -->
    {{-- @include('Template.navbar') --}}
    <!-- End Navbar -->

        <!-- start container -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('PUpdate',$user->id) }}" method="POST" enctype="multipart/form-data" id="AdminInfoForm">
                        @csrf
                        <div class="card">
                            <div class="card-header pb-0">                        
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                      <img class="profile-user-img img-fluid img-circle admin_image"
                                            src="/users/images/{{Auth::user()->image == ''? 'no-image.png':Auth::user()->image}}"
                                            alt="User profile picture" width="225" style="border-radius: .5rem;">
                                    </div>
                                    <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>                   
                                    <p class="text-muted text-center">Admin</p>                 
                                    <input type="file" name="file" id="file" style="opacity: 0;height:1px;display:none">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block " id="change_picture_btn"><b>Ubah Profil</b></a>                     
                                </div>       
                            </div>

                            <div class="card-body">
                                <!-- <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Informasi User</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Ubah Password</a></li>
                                    </ul>  
                                </div>   -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="name">
                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input class="form-control" type="email" value="{{ Auth::user()->email }}" name="email">
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Password</label>
                                            <input class="form-control" type="password" value="{{ Auth::user()->password }}" name="password">
                                            <span class="text-danger error-text password_error"></span>
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">noHp</label>
                                            <input class="form-control" type="tel" value="{{ Auth::user()->nohp }}" name="nohp">
                                            <span class="text-danger error-text nohp_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input class="form-control" type="text" value="{{ Auth::user()->alamat }}" name="alamat">
                                            <span class="text-danger error-text alamat_error"></span>
                                        </div>
                                    </div>
                                </div>           
                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>  
                
                
                 <!-- /.tab-pane -->
                 <div class="container-fluid py-4">
                    <div class="col-md-12">
                        <div class="tab-pane" id="change_password">
                            <form class="form-horizontal" action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Password Lama</label>
                                                    <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                                                    <span class="text-danger error-text oldpassword_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Password Baru</label>
                                                    <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                                    <span class="text-danger error-text newpassword_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Konfirmasi Password Baru</label>
                                                    <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                                    <span class="text-danger error-text cnewpassword_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Update Password</button>
                                    </div>
                                </div>
                            </form>
                          </div>
                      <!-- /.tab-content -->
                     </div>
                 </div>
            </div>
            <!--end row -->

            {{-- footer --}}
            @include('Template.footer')
            {{-- end footer --}}

        </div>
        <!--end container -->       
    </main>
    
    <!--   Core JS Files   -->
    @include('Template.script')

</body>
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>

<script>
$.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(document).on('click','#change_picture_btn', function(){
      $('#file').click();
    });
    $('#file').ijaboCropTool({
          preview : '.admin_image',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("crop") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });


       $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();
         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });
    
</script>

</html>