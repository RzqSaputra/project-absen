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
        <div class="col-md-12">
                @if(session()->has('pesan'))
                <div class="alert alert-success" style="color:white;">
                    {{ session()->get('pesan')}}
                    <div style="float: right">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('PUpdate',$pegawai->id) }}" method="POST" enctype="multipart/form-data" id="PegawaiInfoForm">
                        @csrf
                        <div class="card">
                            <div class="card-header pb-0">                        
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                      <img class="profile-user-img img-fluid img-circle pegawai_image"
                                            src="/users/images/{{Auth::pegawai()->image == ''? 'no-image.png':Auth::pegawai()->image}}"
                                            alt="profil pegawai" width="225" style="border-radius: .5rem;">
                                    </div>
                                    <h3 class="profile-username text-center">{{Auth::pegawai()->name}}</h3>                   
                                    <p class="text-muted text-center">Pegawai</p>                 
                                    <input type="file" name="file" id="file" style="opacity: 0;height:1px;display:none">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-block " id="change_picture_btn"><b>Ubah Profil</b></a>                     
                                </div>       
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" value="{{ Auth::pegawai()->nama }}" name="nama">
                                            <span class="text-danger error-text nama_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">NIP</label>
                                            <input class="form-control" type="number" value="{{ Auth::pegawai()->nip }}" name="nip">
                                            <span class="text-danger error-text nip_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Tanggal Lahir</label>
                                            <input class="form-control" type="date" value="{{ Auth::pegawai()->tglLahir }}" name="tglLahir">
                                            <span class="text-danger error-text tglLahir_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Jenis Kelamin</label>
                                            <input class="form-control" value="{{ Auth::pegawai()->jKel }}" name="jKel">
                                            <span class="text-danger error-text jKel_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">noHp</label>
                                            <input class="form-control" type="tel" value="{{ Auth::pegawai()->nohp }}" name="nohp">
                                            <span class="text-danger error-text nohp_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input class="form-control" type="text" value="{{ Auth::pegawai()->alamat }}" name="alamat">
                                            <span class="text-danger error-text alamat_error"></span>
                                        </div>
                                    </div>
                                </div>           
                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                            </div>
                        </div>
                    </form>
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
          preview : '.pegawai_image',
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
</script>

</html>