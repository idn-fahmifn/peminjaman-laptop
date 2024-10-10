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