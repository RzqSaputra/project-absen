<!DOCTYPE html>
<html lang="en">

@include('Template.head')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
        {{-- sidebar --}}
        @include('Template.sidebarP')
        {{-- end sidebar --}}
        <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('Template.navbar') 
            <!-- End Navbar -->
            
            <div class="container-fluid py-4">
                <div class="col-md-12">
                    @if(session()->has('success'))
                    <div class="alert alert-success" style="color:white;">
                        {{ session()->get('success')}}
                        <div style="float: right">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                   
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div  class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Tanggal</p>
                                            <h5 class="font-weight-bolder"><?php echo date("Y-m-d"); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <i class="fas fa-calendar fa-2x  text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div  class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Waktu</p>
                                        <h5 class="font-weight-bolder" id="clock" onload="currentTime()"></h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="fas fa-clock fa-2x  text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    
                </div>
                {{-- footer --}}
                @include('Template.footer')
                {{-- end footer --}}
            </div>
        </main>
        <!--   Core JS Files   -->
        @include('Template.script')
</body>
<script>
    function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        let session = "AM";

        if (hh == 0) {
            hh = 12;
        }
        if (hh > 12) {
            hh = hh - 12;
            session = "PM";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let time = hh + ":" + mm + ":" + ss + " " + session;

        document.getElementById("clock").innerText = time;
        let t = setTimeout(function () {
            currentTime()
        }, 1000);
    }
    currentTime();

</script>
</html>
