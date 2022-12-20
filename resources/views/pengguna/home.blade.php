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
                            <form action="{{ route('pengguna.simpanPengguna'); }}" method="POST">
                                @csrf
                                <div class='mb-3'>
                                    <label for="nip" class="form-label">NIP</label>
                                    <input required type="number" name="nip" id="nip" value="{{ old("nip") }}"
                                        class="form-control @error('nip') is-invalid @enderror">
                                    @error('nip')
                                    <div class='text-danger'>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input required type="text" name="nama" id="nama" value="{{ old('nama') }}"
                                        class="form-control @error('nama') is-invalid @enderror">
                                    @error('nama')
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
                                    <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                    <input required type="date" name="tglLahir" id="tglLahir"
                                        value="{{ old('tglLahir') }}"
                                        class="form-control @error('tglLahir') is-invalid @enderror">
                                    @error('tglLahir')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input required type="tel" name="alamat" id="alamat" value="{{ old('alamat') }}"
                                        class="form-control @error('alamat') is-invalid @enderror">
                                    @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="noHp" class="form-label">Nomor Hp</label>
                                    <input required type="tel" name="noHp" id="noHp" value="{{ old('noHp') }}"
                                        class="form-control @error('noHp') is-invalid @enderror">
                                    @error('noHp')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <input required type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"
                                        class="form-control @error('jabatan') is-invalid @enderror">
                                    @error('jabatan')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cabang" class="form-label">Cabang</label>
                                    <select name="cabang" id="cabang" class="form-control" value="{{ old('cabang') }}">
                                        <option>-- Pilih Cabang --</option>
                                        <option value="Pontianak" {{ old('cabang')=='Pontianak' ? 'selected' : '' }}>
                                            Pontianak
                                        </option>
                                        <option value="Jakarta" {{ old('cabang')=='Jakarta' ? 'selected' : '' }}>Jakarta
                                        </option>
                                        <option value="Papua" {{ old('cabang')=='Papua' ? 'selected' : '' }}>
                                            Papua</option>
                                        <option value="Jawa Barat" {{ old('cabang')=='Jawa Barat' ? 'selected' : '' }}>
                                            Jawa Barat
                                        </option>
                                    </select>
                                    @error('cabang')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                                Jabatan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengguna as $key => $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$pengguna->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->nama}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->email}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->jabatan}}</span>
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
                                <small class="px-3">
                                    showing
                                    {{$pengguna->firstItem()}}
                                    to
                                    {{$pengguna->lastItem()}}
                                    of
                                    {{$pengguna->total()}}
                                    entries
                                </small>
                                {{-- modal edit data --}}
                                @foreach($pengguna as $p)
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
                                                <form action="/pengguna/update/{{ $p->id }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="nama" name="nama" id="nama"
                                                            value="{{ old('nama') ?? $p->nama }}"
                                                            class="form-control @error('nama') is-invalid @enderror">
                                                        @error('nama')
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
                                                        <label for="jabatan" class="form-label">Jabatan</label>
                                                        <input type="text" name="jabatan" id="jabatan"
                                                            value="{{ old('jabatan') ?? $p->jabatan }}"
                                                            class="form-control @error('jabatan') is-invalid @enderror">
                                                        @error('jabatan')
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
                                @foreach($pengguna as $p)
                                <div class="modal fade" id="deleteModal-{{ $p->id }}"
                                    aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="padding: 15px">
                                            <div class="modal-body">Hapus data {{$p->nama }} ?</div>
                                            <div style="margin-right: 10px;">
                                                <a class="btn btn-danger" href="/pengguna/delete/{{$p->id}}"
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
        <style>
            .page-item .page-link {
                color: black;
                border: 1px rgba(43, 41, 41, 0.5);
            }

        </style>
        <div class="page" style="margin-left:75%; color:white;">
            {{$pengguna->links()}}
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
