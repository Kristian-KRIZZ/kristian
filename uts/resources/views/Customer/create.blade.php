@extends('layout.master')

@section('title', 'Tambah Customer')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/customer') }}">customer</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Tambah customer</h4>
            </div>
        </div>
        <form action="{{ url('/sparepart') }}" method="POST">
            <div class="card-body">
                @csrf
                <div>
                    <label class="form-label">CID</label>
                    <input class="form-control" type="text" name="cid">
                </div>
                <div>
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama">
                </div>
                <div>
                    <label class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat">
                </div>
                <div>
                    <label class="form-label">Paket</label>
                    <select class="form-select" name="paket">
                        @foreach ($paket as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection