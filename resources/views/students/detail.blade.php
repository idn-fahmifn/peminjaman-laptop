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
                Tambah Data
            </button>

            {{-- table --}}
            <div class="table-responsive mt-4">
                <table class="table table-borderless">
                    <tr>
                        <th>Nama kelas</th>
                        <td>{{$data->nama}}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>{{$data->jurusan}}</td>
                    </tr>
                    <tr>
                        <th>Nama Wali Kelas</th>
                        <td>{{$data->wali_kelas}}</td>
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
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('grades.update', $data->id) }}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Kelas</label>
                                <input type="text" class="form-control" required name="nama" value="{{$data->nama}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option value="{{$data->jurusan}}">{{$data->jurusan}}</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                    <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                    <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Nama Wali Kelas</label>
                                <input type="text" class="form-control" required name="wali_kelas" value="{{$data->wali_kelas}}">
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