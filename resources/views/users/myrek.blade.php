@extends('user')
@section('title', 'My Rekening')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data of Rekening</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i>
                        Dashboard</a></div>
                <div class="breadcrumb-item active" aria-current="page">Data Rekening</div>
            </div>
        </div>

        <div class="section-body">
            @if($rekening->count() == 0)
            <div class="row">
                <div class="col-12 col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Tidak Ditemukan</h4>
                    </div>
                    <div class="card-body">
                      <div class="empty-state" data-height="400">
                        <div class="empty-state-icon">
                          <i class="fas fa-question"></i>
                        </div>
                        <h2>Belum mempunyai rekening</h2>
                        <p class="lead">
                          Mohon maaf kami belum menemukan rekening anda. <span class="text-warning">Ingin membuat rekening ?</span>
                        </p>
                        <a href="{{ route('user.create-step-1') }}" class="btn btn-primary mt-4">Buat Rekening</a>
                        <a href="#" class="mt-4 bb">Need Help?</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @elseif ($rekening->count() == 1)
              @foreach ($rekening as $rek)
              <div class="card author-box">
                <div class="card-header">
                    <h4>Rekening Saya</h4>
                </div>
                <div class="card-body">
                    <div class="author-box-left">
                        <img alt="image" src="{{ asset('assets/img/seventeen-bank.svg') }}" class="rounded-circle author-box-picture border border-primary">
                        <div class="clearfix"></div>
                        @if($rek->status_rek == 'disable')
                        <span class="badge badge-warning m-2">Disable</span>
                        @elseif ($rek->status_rek == 'enable')
                        <span class="badge badge-success m-2">Enable</span>
                        @elseif ($rek->status_rek == 'blocked')
                        <span class="badge badge-danger m-2">Blocked</span>
                        @endif
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                          <a href="#" id="nama-nasabah">{{ $rek->nama_lengkap }}</a>
                        </div>
                        <div class="author-box-job">Join pada tanggal <span>{{ $rek->created_at }}</span></div>
                        <hr>
                        <div class="author-box-job">Saldo Anda <span>Rp. {{ $rek->total_saldo }},-</span></div>
                        <div class="author-box-description">
                            <div class="form-group">
                                <label>No.Rekening</label>
                                <input type="text" class="form-control" name="no_rek" value="{{ $rek->no_rekening }}" disabled tabindex="-1" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="no_rek" value="{{ $rek->user->email }}" disabled tabindex="-1" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="no_rek" value="{{ $rek->jenis_kelamin }}" disabled tabindex="-1" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>No. Induk</label>
                                <input type="text" class="form-control" name="no_rek" value="{{ $rek->nomor_induk }}" disabled tabindex="-1" required autofocus>
                            </div>
                        </div>
                        <div class="w-100 d-sm-none"></div>
                        <div class="float-right mt-sm-0 mt-3">
                          <a href="#" class="btn">Ubah Pin <i class="fas fa-chevron-right"></i></a>
                        </div>
                      </div>
                </div>
                <div class="card-footer text-center">
                    <span>Copyright © Seventeen Bank</span>
                </div>
            </div>
              @endforeach
            @endif
        </div>
    </section>
</div>
@endsection
