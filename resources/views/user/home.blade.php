<!DOCTYPE html>
<html lang="en">
@include('Template.head')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('Template.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('Template.navbar')
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="col-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahModal">
                    <button class="btn bg-gradient-dark mb-3">Tambah Data</button>
                </a>
            </div>
            
            {{-- modal tambah data --}}
            <div class="modal fade" id="tambahModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Pengguna</h5>
                            <button class="btn-close bg-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.simpanUser'); }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input required type="text" name="name" id="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input required type="email" name="email" id="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input required type="password" name="password" id="password"
                                        value="{{ old('password') }}"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control" value="{{ old('role') }}">
                                        <option>-- Role --</option>
                                        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="pegawai" {{ old('role')=='pegawai' ? 'selected' : '' }}>
                                            Pegawai
                                        </option>
                                        class="form-control @error('role') is-invalid @enderror">
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </select>
                                </div>

                                <div style="float: right">
                                    <button type="submit" class="btn btn-primary mb-2">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal tambah data --}}
            <div class="row">
                <div class="col-md-12">

                    @if (session()->has('msg'))
                    <div class="alert alert-success" style="color:white;">
                        {{ session()->get('msg') }}
                        <div style="float: right">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Pengguna</h6>
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
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Role</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $key => $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$user->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->name}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->email}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->role}}</span>
                                            </td>
                                            <td class="align-middle text-center">
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
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <small class="px-3" style="font-weight: bold">
                                    Showing
                                    {{$user->firstItem()}}
                                    to
                                    {{$user->lastItem()}}
                                    of
                                    {{$user->total()}}
                                    entries
                                </small>
                                <style>
                                    .page .page-item.active .page-link  {
                                        color: white;
                                    }
                                </style>
                                <div class="page" style="float: right; font-weight:bold; margin-right: 50px; margin-top: 20px;">
                                    {{$user->links()}}
                                </div>
                                {{-- modal edit data --}}
                                @foreach($user as $p)
                                <div class="modal fade" id="editModal-{{$p->id}}" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna</h5>
                                                <button class="btn-close bg-danger" type="button"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/user/update/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama</label>
                                                        <input type="name" name="name" id="name"
                                                            value="{{ old('name') ?? $p->name }}"
                                                            class="form-control @error('name') is-invalid @enderror">
                                                        @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email"
                                                            value="{{ old('email') ?? $p->email }}"
                                                            class="form-control @error('email') is-invalid @enderror">
                                                        @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="role" class="form-label">Role</label>
                                                        <input type="text" name="role" id="role"
                                                            value="{{ old('role') ?? $p->role}}"
                                                            class="form-control @error('role') is-invalid @enderror">
                                                        @error('role')
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
                                @foreach($user as $p)
                                <div class="modal fade" id="deleteModal-{{ $p->id }}"
                                    aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="padding: 15px">
                                            <div class="modal-body">Hapus data {{$p->name }} ?</div>
                                            <div style="margin-right: 10px;">
                                                <a class="btn btn-danger" href="/user/delete/{{$p->id}}"
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
        {{-- footer --}}
        @include('Template.footer')
        {{-- end footer --}}
        </div>
    </main>
    <!--   Core JS Files   -->
    @include('Template.script')
</body>

</html>
