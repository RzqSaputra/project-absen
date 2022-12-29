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
            {{-- @include('Template.navbar') --}}
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <form method="get">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="cari" placeholder="Search" style="padding-right: 150px">
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
                                <button type="button" class="btn btn-danger mt-3" >
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

        {{-- task mingguan --}}
        <div class="container-fluid py-2">
            <div class="col-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <button class="btn bg-gradient-dark mb-3">Tambah Task</button>
                </a>
            </div>
            {{-- modal tambah data --}}
            <div class="modal fade" id="tambahModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Task</h5>
                            <button class="btn-close bg-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('TaskMingguan.simpanTaskMingguan'); }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="namaTask" class="form-label">Nama Task</label>
                                    <input required type="text" name="namaTask" id="namaTask" value="{{ old('namaTask') }}"
                                        class="form-control @error('namaTask') is-invalid @enderror">
                                    @error('namaTask')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                <div class="mb-3">
                                    <label for="mulaiTask" class="form-label">Mulai Task</label>
                                    <input required type="date" name="mulaiTask" id="mulaiTask"
                                        value="{{ old('mulaiTask') }}"
                                        class="form-control @error('mulaiTask') is-invalid @enderror">
                                    @error('mulaiTask')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                <div class="mb-3">
                                    <label for="selesaiTask" class="form-label">Selesai Task</label>
                                    <input required type="date" name="selesaiTask" id="selesaiTask"
                                        value="{{ old('selesaiTask') }}"
                                        class="form-control @error('selesaiTask') is-invalid @enderror">
                                    @error('selesaiTask')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input required type="text" name="keterangan" id="keterangan" value="{{ old('keterangan') }}"
                                        class="form-control @error('keterangan') is-invalid @enderror">
                                    @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
        
                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary mb-2">Tambah Task</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal tambah data --}}
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Task Mingguan</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Task</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                Mulai Task</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Selesai Task</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($TaskMingguan as $key => $tm)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$TaskMingguan->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$tm->namaTask}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$tm->mulaiTask}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$tm->selesaiTask}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$tm->keterangan}}</span>
                                            </td>
                                            {{-- <td class="align-middle text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target=" #editModal-{{$p->id}}">
                                                    <button class="btn btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $p->id }}">
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i></button>
                                                </a>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- modal edit data --}}
                                @foreach($TaskMingguan as $tm)
                                <div class="modal fade" id="editModal-{{$tm->id}}" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit task</h5>
                                                <button class="btn-close bg-danger" type="button"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/taskMingguan/update/{{ $tm->id }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="namaTask" class="form-label">Nama Task</label>
                                                        <input type="text" name="namaTask" id="namaTask"
                                                            value="{{ old('namaTask') ?? $tm->namaTask }}"
                                                            class="form-control @error('namaTask') is-invalid @enderror">
                                                        @error('namaTask')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label for="mulaiTask" class="form-label">Mulai Task</label>
                                                        <input type="date" name="mulaiTask" id="mulaiTask"
                                                            value="{{ old('mulaiTask') ?? $tm->mulaiTask }}"
                                                            class="form-control @error('mulaiTask') is-invalid @enderror">
                                                        @error('mulaiTask')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
        
                                                    <div class="mb-3">
                                                        <label for="selesaiTask" class="form-label">Mulai Task</label>
                                                        <input type="date" name="selesaiTask" id="selesaiTask"
                                                            value="{{ old('selesaiTask') ?? $tm->selesaiTask }}"
                                                            class="form-control @error('selesaiTask') is-invalid @enderror">
                                                        @error('selesaiTask')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="mb-3">
                                                        <label for="keterangan" class="form-label">keterangan</label>
                                                        <select name="keterangan" id="keterangan" class="form-control" value="{{ old('keterangan') }}">
                                                            <option>{{$tm->keterangan}}</option>
                                                            <option value="Belum" {{ old('keterangan')=='Belum' ? 'selected' : '' }} >
                                                                Belum
                                                            </option>
                                                            <option value="Proses" {{ old('keterangan')=='Proses' ? 'selected' : '' }}>Proses
                                                            </option>
                                                            <option value="Sudah" {{ old('keterangan')=='Sudah' ? 'selected' : '' }}>
                                                                Sudah</option>
                                                        </select>
                                                        @error('cabang')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
        
                                                    <div style="float: right">
                                                        <button type="submit"
                                                            class="btn btn-primary mb-2">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- end modal edit data --}}
        
                                <!-- Delete Modal-->
                                @foreach($TaskMingguan as $p)
                                <div class="modal fade" id="deleteModal-{{ $p->id }}"
                                    aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="padding: 15px">
                                            <div class="modal-body">Hapus data {{$p->nama }} ?</div>
                                            <div style="margin-right: 10px;">
                                                <a class="btn btn-danger" href="/task/delete/{{$p->id}}"
                                                    style="float: right">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end task mingguan --}}

        {{-- footer --}}
        @include('Template.footer')
        {{-- end footer --}}
    </main>
    <!--   Core JS Files   -->
    @include('Template.script')
</body>

