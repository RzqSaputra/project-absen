<!DOCTYPE html>
<html lang="en">
@include('Template.head')

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    @include('Template.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('Template.navbar')

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                            <h5 class="modal-title" id="exampleModalLabel">Pendaftaran Pegawai</h5>
                            <button class="btn-close bg-danger" type="button" data-bs-dismiss="modal"
                                aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pegawai.simpanPegawai'); }}" method="POST">
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
                                    <label for="user_id" class="form-label">Nama Pegawai</label>
                                    <select name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}" required>
                                    <option>-- Pilih Nama Pegawai --</option>
                                    @foreach ($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('user_id')
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
                                    <label for="jKel" class="form-label">Jenis Kelamin</label>
                                    <select required name="jKel" id="jKel" class="form-control" value="{{ old('jKel') }}" required>
                                        <option>-- Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jKel')=='Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan" {{ old('jKel')=='Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('jkel')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="noHp" class="form-label">Nomor Hp</label>
                                    <input required type="tel" name="noHp" id="noHp" value="{{ old('noHp') }}"
                                        class="form-control @error('noHp') is-invalid @enderror" required>
                                    @error('noHp')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                    <select required name="jabatan_id" id="jabatan_id" class="form-control" value="{{ old('jabatan_id') }}" required>
                                        <option>-- Pilih Jabatan --</option>
                                        @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cabang_id" class="form-label">Cabang</label>
                                    <select name="cabang_id" id="cabang_id" class="form-control" value="{{ old('cabang_id') }}" required>
                                    <option>-- Pilih Cabang --</option>
                                    @foreach ($cabang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_cabang }}</option>
                                    @endforeach
                                    </select>
                                    @error('cabang_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class='mb-3'>
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat"
                                        rows="3" required>{{ old('alamat') }}</textarea>
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
                    @if(session()->has('pesan'))
                    <div class="alert alert-success" style="color:white;">
                        {{ session()->get('pesan')}}
                        <div style="float: right">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Pegawai</h6>
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
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NIP</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jabatan</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Cabang</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawai as $key => $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="px-2 mb-0 text-xs">{{$pegawai->firstItem()+$key}}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{$p->nip}}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold mb-0">{{$p->user->name}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->jabatan->nama_jabatan}}</span>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$p->cabang->nama_cabang}}</span>
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
                                    {{$pegawai->firstItem()}}
                                    to
                                    {{$pegawai->lastItem()}}
                                    of
                                    {{$pegawai->total()}}
                                    entries
                                </small>
                                <style>
                                    .page .page-item.active .page-link {
                                        color: white;
                                    }

                                </style>
                                <div class="page"
                                    style="float: right; font-weight:bold; margin-right: 50px; margin-top: 20px;">
                                    {{$pegawai->links()}}
                                </div>

                                {{-- modal edit data --}}
                                @foreach($pegawai as $p)
                                <div class="modal fade" id="editModal-{{$p->id}}" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                                                <button class="btn-close bg-danger" type="button"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="/pegawai/update/{{ $p->id }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nip" class="form-label">Nip
                                                    </label>
                                                    <input type="text" name="nip" id="nip"
                                                        value="{{ old('nip') ?? $p->nip }}"
                                                        class="form-control @error('nip') is-invalid @enderror">
                                                    @error('nip')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="user_id" class="form-label">Nama Pegawai</label>
                                                    <select name="user_id" id="user_id" class="form-control"
                                                        value="{{ old('user_id') }}">
                                                        <option value="{{$p->user->id}}">{{ $p->user->name }}</option>
                                                        <option disabled>-- Pilih Pegawai --</option>
                                                        @foreach ($user as $item)
                                                        <option value="{{$item->id}}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                                    <select name="jabatan_id" id="jabatan_id" class="form-control"
                                                        value="{{ old('nama_jabatan') }}">
                                                        <option value="{{$p->jabatan->id}}">{{ $p->jabatan->nama_jabatan }}</option>
                                                        <option disabled>-- Pilih jabatan --</option>
                                                        @foreach ($jabatan as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_jabatan }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jabatan_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cabang_id" class="form-label">Cabang</label>
                                                    <select name="cabang_id" id="cabang_id" class="form-control"
                                                        value="{{ old('nama_cabang') }}">
                                                        <option value="{{$p->cabang->id}}">{{ $p->cabang->nama_cabang }}</option>
                                                        <option disabled>-- Pilih Cabang --</option>
                                                        @foreach ($cabang as $item)
                                                        <option value="{{$item->id}}">{{ $item->nama_cabang }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('cabang_id')
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
                                @foreach($pegawai as $p)
                                <div class="modal fade" id="deleteModal-{{ $p->id }}"
                                    aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="padding: 15px">
                                            <div class="modal-body">Hapus data {{$p->user->name }} ?</div>
                                            <div style="margin-right: 10px;">
                                                <a class="btn btn-danger" href="/pegawai/delete/{{$p->id}}"
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
