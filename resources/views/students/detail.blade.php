@extends('layouts.template')

@section('page-title')
Kelas
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
            
            <h4 class="header-title">Ubah data</h4>
            <p class="text-muted">Jika ingin mengubah, silakan hubungi admin</p>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalform2">
                Ubah Data
            </button>

            {{-- table --}}
            <div class="table-responsive mt-4">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama Siswa</th>
                        <td>{{$data->nama_siswa}}</td>
                        <td rowspan="4">
                            <img src="{{asset('storage/public/images/foto-siswa/'.$data->foto)}}" alt="Gambar Siswa" class="img-fluid" width="150">
                        </td>
                    </tr>
                    <tr>
                        <th>Nomor Induk Siswa</th>
                        <td>{{$data->nis}}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{$data->grade->nama}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{$data->jenis_kelamin}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalform2" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('students.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Siswa</label>
                                <input type="text" class="form-control" value="{{$data->nama_siswa}}" required name="nama_siswa">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kelas</label>
                                <select name="id_grades" class="form-control">
                                    <option value="{{$data->id_grades}}">{{$data->grade->nama}}</option>
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
                                <input type="text" class="form-control" required name="nis" value="{{$data->nis}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="{{$data->jenis_kelamin}}">{{$data->jenis_kelamin}}</option>
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
                                <input type="file" id="input-file-now-custom-3" name="foto" value="{{$data->foto}}"
                                    class="dropify" data-default-file="{{ asset('storage/public/images/foto-siswa/'.$data->foto) }}" />
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