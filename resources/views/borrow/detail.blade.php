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

            <h4 class="header-title">Peminjaman Laptop</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pinjam">
                Pinjam Laptop
            </button>

            {{-- table --}}
            <div class="table-responsive mt-4">
                <table class="table table-striped" id="datatable-buttons">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($pinjam as $item)
                        <tr>
                            <td>{{ $item->student->nama_siswa }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali }}</td>
                            <td>
                                @if($item->status == 'dipinjam')
                                <span class="badge badge-warning">dipinjam / belum dikembalikan</span>
                                @else
                                <span class="badge badge-success">sudah dikembalikan</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 'dikembalikan')
                                dikembalikan pada <span class="text-success">{{$item->updated_at}}</span>
                                @else
                                <form action="{{route('borrow.update', $item->id)}}" method="post">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Laptop sudah dikembalikan?')">Kembalikan Laptop</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="pinjam" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('borrow.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Siswa</label>
                                <input type="text" class="form-control" value="{{$data->nama_siswa}}" readonly>
                                <input type="number" name="id_student" value="{{$data->id}}" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Tanggal Pinjam</label>
                            <input type="date" class="form-control" name="tanggal_pinjam">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Jam Pinjam</label>
                            <input type="time" class="form-control" name="jam_pinjam">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="control-label">Tanggal Dikembalikan</label>
                            <input type="date" class="form-control" name="tanggal_kembali">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="control-label">Jam Kembali</label>
                            <input type="time" class="form-control" name="jam_kembali">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="" class="control-label">Alasan peminjaman</label>
                            <input type="text" name="alasan" class="form-control">
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