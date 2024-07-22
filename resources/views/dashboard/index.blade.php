@extends('main')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
                <div class="container">
                <div class="card" style="width: 170%">
                    <div class="card-body" >
                    <div class="card-header">
                        <strong class="card-title">Schedule</strong>
                    </div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr style="text-align: center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Mata Kuliah</th>
                                    <th>Ruangan</th>
                                    <th>Jam</th>
                                    <th>Hari</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dashboard as $dsb)
                                <tr style="text-align: center">
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><a href="/pertemuan">{{$dsb->getDosen->nama}}</a></td>
                                    <td>{{$dsb->getMatkul->nama_matkul}}</td>
                                    <td>{{$dsb->getKelas->ruangan}}</td>
                                    <td>{{$dsb->jam}}</td>
                                    <td>{{$dsb->hari}}</td>
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
