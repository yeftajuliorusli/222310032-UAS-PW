@extends('main')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <form method="post" action="{{ route('dashboard.updatePresensi', ['id' => $presensi->id]) }}" enctype="multipart/form-data">
            @method('post')
            @csrf
            <div class="card-header"><strong>Edit</strong><small> Presensi</small></div>
            <div class="card-body card-block">
                <div class="mb-3">
                    <label class="form-label">Absent</label>
                    <select name="absent" class="form-control @error('absent') is-invalid @enderror">
                        <option value="Hadir" {{ $presensi->absent == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Tidak Hadir" {{ $presensi->absent == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir</option>
                    </select>
                    @error('absent')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                        <option value="-" {{ $presensi->keterangan == '-' ? 'selected' : '' }}>-</option>
                        <option value="Izin" {{ $presensi->keterangan == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Alfa" {{ $presensi->keterangan == 'Alfa' ? 'selected' : '' }}>Alfa</option>
                        <option value="Sakit" {{ $presensi->keterangan == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Dispen" {{ $presensi->keterangan == 'Dispen' ? 'selected' : '' }}>Dispen</option>
                    </select>
                    @error('keterangan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection
