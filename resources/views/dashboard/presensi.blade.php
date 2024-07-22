@extends('main')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="content mt-3">
                    <div class="page-title">
                        {{-- <h1>Data Presensi mata kuliah {{$presensi->nama_matkul}}</h1> --}}
                    </div>
                    <div class="card text-center" style="width:70%; height:60%">
                        <div class="card-header">
                            QR Code
                        </div>
                        <div class="card-body" style="width:10%;height:10%">
                            <div style="text-align: center">
                                {!! $qrcode !!}
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 200%">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form id="presensiForm" action="{{ url('/savePresensi') }}" method="POST">
                                @csrf
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Absent</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $student->nama }}</td>
                                                <td style="text-align: center">
                                                    <input type="hidden" name="presensi[{{ $loop->index }}][id]" value="{{ $student->id }}">
                                                    <div>
                                                        <input type="radio" id="hadir{{ $loop->iteration }}" name="presensi[{{ $loop->index }}][absent]" value="Hadir" {{ $student->absent == "Hadir" ? 'checked' : '' }} onclick="setKeterangan({{ $loop->iteration }}, 'Hadir')"> Hadir
                                                        <input type="radio" id="tidakhadir{{ $loop->iteration }}" name="presensi[{{ $loop->index }}][absent]" value="Tidak Hadir" {{ $student->absent == "Tidak Hadir" ? 'checked' : '' }} onclick="setKeterangan({{ $loop->iteration }}, '')"> Tidak Hadir
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    <input type="text" id="keterangan{{ $loop->iteration }}" name="presensi[{{ $loop->index }}][keterangan]" value="{{ $student->keterangan }}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right mt-3 mr-3">
                                    <button type="submit" class="btn btn-warning">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('scripts')
<script>
    function setKeterangan(id, value) {
        var keteranganInput = document.getElementById('keterangan' + id);
        keteranganInput.value = value;
        if (value === 'Hadir') {
            keteranganInput.readOnly = true;
        } else {
            keteranganInput.readOnly = false;
        }
    }
</script>
@endsection
