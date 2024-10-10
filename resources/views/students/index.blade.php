@extends('layouts.template')

@section('page-title')
Siswa
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Sukeses!</strong> {{ session('success') }}.
            </div>
            @endif

            <h4 class="header-title">Data Siswa</h4>
            <p class="text-muted">Jika ingin mengubah, silakan hubungi admin</p>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalform2">
                Tambah Data
            </button>

            {{-- table --}}
            <div class="table-responsive mt-4">
                <table class="table table-striped" id="datatable-buttons">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->grade->nama }}</td>
                            <td>
                                <form action="{{route('students.destroy', $item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                                    <a href="{{route('students.show', $item->id)}}" class="btn btn-info">Detail</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalform2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Siswa</label>
                                <input type="text" class="form-control" required name="nama_siswa"
                                    placeholder="contoh : Muhammad Abdan">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kelas</label>
                                <select name="id_grades" class="form-control">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Nomor Induk Siswa (NIS)</label>
                                <input type="text" class="form-control" required name="nis"
                                    placeholder="0017637473">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Foto Siswa</label>
                                <input type="file" id="input-file-now-custom-3" name="foto"
                                    class="dropify" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection