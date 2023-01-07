<!DOCTYPE html>
<html lang="en">

@include('Template.head')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
        {{-- sidebar --}}
        @include('Template.sidebar')
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
                

                
                {{-- footer --}}
                @include('Template.footer')
                {{-- end footer --}}
            </div>
        </main>
        <!--   Core JS Files   -->
        @include('Template.script')
</body>

</html>
