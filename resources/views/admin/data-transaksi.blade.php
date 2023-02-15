@extends('admin')
@section('title', 'Data Transaksi')
@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data of Rekening</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i> Dashboard</a></div>
          <div class="breadcrumb-item active" aria-current="page">Data Rekening</div>
        </div>
      </div>

      <div class="section-body">


        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Rekening</h4><hr>
                  <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fa-solid fa-file-export"></i> Export</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            No
                          </th>
                          <th>Nama</th>
                          <th>No. Rekening</th>
                          <th>Kode Transaksi</th>
                          <th>Tgl. Transaksi</th>
                          <th>Jenis Transaksi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $transaksi)
                        <tr>
                            <td class="text-center">
                              {{ $no++ }}
                            </td>
                            <td>{{ $transaksi->rekening->user->name }}</td>
                            <td>{{ $transaksi->rekening->no_rekening }}</td>
                            <td>{{ $transaksi->kode_transaksi }}</td>
                            <td>{{ $transaksi->tgl_transaksi }}</td>
                            <td>{{ $transaksi->jenis_transaksi }}</td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
  </div>
@endsection
