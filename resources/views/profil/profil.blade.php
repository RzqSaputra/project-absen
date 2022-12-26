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
                    <form action="{{ route('PUpdate',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit Profil</p>
                                </div>
                              
                                <div class="mb-3">
                                    <img class="img-preview img-fluid mb-3 col-sm-5" style="width:20%;">
                                    <hr>
                                    <label for="image" class="form-label">Post Image</label>
                                    <input class="form-control @error ('image') is-invalid @enderror"
                                            type="file" id="image" name="image" onchange="previewImage()">
                                </div>
                            </div>
                            <div class="card-body">
                            <p class="text-uppercase text-sm">Informasi User</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama</label>
                                            <input class="form-control" type="text" value="{{ $user->name }}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Email</label>
                                            <input class="form-control" type="email" value="{{ $user->email }}" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">noHp</label>
                                            <input class="form-control" type="tel" value="{{ $user->noHp }}" name="nohp">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Alamat</label>
                                            <input class="form-control" type="text" value="{{ $user->alamat }}" name="alamat">
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Kemampuan</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Posisi</label>
                                            <input class="form-control" type="text" value="{{ $user->tentang }}" name="tentang">
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
<script>
    function previewImage()
    {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFRevent) {
            imgPreview.src = oFRevent.target.result;
        }
    }
    
</script>
</html>