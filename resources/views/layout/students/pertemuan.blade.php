@extends('main')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h1>Pertemuan</h1>
                </div>
                <div class="container">
                <div class="card" style="width: 170%">
                    <div class="card-body">
                    <div class="card-header">
                        <strong class="card-title">Jadwal Pertemuan</strong>
                    </div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align: center">
                                    <th>No</th>
                                    <th>Pertemuan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $pertemuan)
                                <tr style="text-align: center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('presensi.show', $pertemuan->id) }}">Pertemuan ke - {{ $loop->iteration }}</a>
                                    </td>
                                    <td>{{ $pertemuan->tanggal }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
