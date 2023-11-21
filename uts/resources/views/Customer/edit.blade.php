@extends('layout.master')

@section('title', 'Ubah Customer')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/customer') }}">customer</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Ubah customer</h4>
            </div>
        </div>
        <form action="{{ url('/customer/' . $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div>
                    <label class="form-label">CID</label>
                    <input class="form-control" type="text" name="cid" value="{{ $data->cid }}">
                </div>
                <div>
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{ $data->nama }}">
                </div>
                <div>
                    <label class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="{{ $data->alamat }}">
                </div>
                <div>
                    <label class="form-label">Paket</label>
                    <select class="form-select" name="paket">
                        @foreach ($paket as $p)
                            <option {{ $data->paket_id == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->nama }}</option>
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