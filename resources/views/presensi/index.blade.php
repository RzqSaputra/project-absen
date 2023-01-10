<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@include('Template.head')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    {{-- sidebar --}}
    @include('Template.sidebarP')
    {{-- end sidebar --}}
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        {{-- @include('Template.navbar') --}}
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <form method="get">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="cari" placeholder="Search"
                            style="padding-right: 150px">
                    </div>
                </form>
            </div>
            <div class="container-fluid py-1 px-3">
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <button type="button" class="btn btn-danger mt-3">
                                    Logout
                                </button>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="padding: 15px">
                                <div class="modal-body">Apakah anda yakin untuk logout?</div>
                                <div style="margin-right: 10px;">
                                    @if (Auth::user())
                                    <form action="{{ asset('logout') }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" style="float: right">Logout</button>
                                    </form>
                                    @else
                                    <h1>Tidak Ada Session</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <style>
            .container {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                margin-top: 100px;
            }

            #start-camera {
                height: 40px;
            }

            #click-photo {
                height: 40px;
            }

            .start {
                display: flex;
                flex-direction: column;
                margin: 0 20px;
                gap: 20px;
            }

            .click {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .bt {
                display: flex;
                gap: 10px;
                justify-content: center
            }

            video {
                border-radius: 20px;
            }

            canvas {
                border-radius: 20px;
            }

        </style>

        <div class="container">

            <form method="POST" action="{{ route('presensi.simpanPresensi') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br />
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results"></div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br />
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>


        <script language="JavaScript">
            Webcam.set({
                width: 490,
                height: 350,
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');

            function take_snapshot() {
                Webcam.snap(function (data_uri) {
                    $(".image-tag").val(data_uri);
                    document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                });
            }

        </script>
        
        </div>
        {{-- footer --}}
        @include('Template.footer')
        {{-- end footer --}}
    </main>
    <!--   Core JS Files   -->
    @include('Template.script')
</body>
