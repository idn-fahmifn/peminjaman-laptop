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

            {{-- table --}}
            <div class="table-responsive mt-4">
                <table class="table table-striped" id="datatable-buttons">
                    <thead>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Pilihan</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->grade->nama }}</td>
                            <td>
                                <form action="{{route('borrow.destroy', $item->id)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                                    <a href="{{route('borrow.show', $item->id)}}" class="btn btn-info">Detail</a>
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

@endsection