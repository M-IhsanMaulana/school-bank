@extends('admin')
@section('title', 'Data Rekening')
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
                  <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            No
                          </th>
                          <th>User Id</th>
                          <th>Nama</th>
                          <th>No. Induk</th>
                          <th>Kelas</th>
                          <th>Nomor Rekening</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $rekening)
                        <tr>
                            <td class="text-center">
                              {{ $no++ }}
                            </td>
                            <td>{{ $rekening->user_id }}</td>
                            <td>{{ $rekening->nama_lengkap }}</td>
                            <td>{{ $rekening->nomor_induk }}</td>
                            <td>{{ $rekening->kelas->name }}</td>
                            <td>{{ $rekening->no_rekening }}</td>
                            <td>{{ $rekening->status_rek }}</td>
                            <td><a href="{{ route('admin.detail-rekening', $rekening->id) }}" class="btn btn-secondary">Detail</a></td>
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
