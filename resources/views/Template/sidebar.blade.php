<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#">
            <img src="/sabang.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-0 font-weight-bold">Sabang Digital Indonesia</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <style>
        /* .nav-item:hover:focus {
            background-color: whitesmoke;
            color: white;
        } */
    </style>
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/home">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-app text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Master Data</span>
                </a>
                <ul class="collapse flex-column ms-1" style="list-style: none; margin-top:-10px;" id="collapseOne"
                    data-bs-parent="#menu">
                    <li style="margin-left: -30px;">
                        <a href="/pegawai" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Pegawai</span>
                        </a>
                    </li>
                    <li style="margin-left: -30px; margin-top:-20px;">
                        <a href="/user  " class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-app text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">User</span>
                        </a>
                    </li>
                </ul>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-badge text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Absensi</span>
                </a>
                <ul class="collapse flex-column ms-1" style="list-style: none; margin-top:-10px;" id="collapseThree"
                    data-bs-parent="#menu">
                    <li style="margin-left: -30px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-badge text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Absensi Manual</span>
                        </a>
                    </li>
                    <li style="margin-left: -30px; margin-top:-20px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-badge text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Alfa/Izin</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                    aria-expanded="false" aria-controls="collapseTwo">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Rekap Data</span>
                </a>
                <ul class="collapse flex-column ms-1" style="list-style: none; margin-top:-10px;" id="collapseFour"
                    data-bs-parent="#menu">
                    <li style="margin-left: -30px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Data Absensi</span>
                        </a>
                    </li>
                    <li style="margin-left: -30px; margin-top:-20px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Data pegawai telat</span>
                        </a>
                    </li>
                    <li style="margin-left: -30px; margin-top:-20px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Data pegawai tidak absen</span>
                        </a>
                    </li>
                    <li style="margin-left: -30px; margin-top:-20px;">
                        <a href="#" class="nav-link">
                            <div
                                class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                                <i class="ni ni-archive-2 text-info text-sm opacity-10"></i>
                            </div>
                            <span class="d-none nav-link d-sm-inline">Data pegawai alfa/izin</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="/profil">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
            </ul>
        </div>
</aside>
