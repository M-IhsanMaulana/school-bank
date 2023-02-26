@extends('admin')
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
              @foreach ($rekening as $rek)
              <div class="card author-box">
                <div class="card-header">
                    <h4>Rekening Saya</h4>
                    <hr>
                    <a href="{{ route('admin.data-rekening') }}" class="btn btn-primary btn-icon"><i class="fas fa-arrow-left"></i> Back</a>
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
                            <form action="" method="post"></form>
                            @if ($rek->status_rek == 'disable')
                            <form action="{{ route('admin.detail-rekening.post', $rek->id) }}" method="post">
                                @csrf
                                <div class="form-group ">
                                    <label class="text-md-right text-left mt-2">Aktivasi Rekening</label>
                                    <div class="">
                                        <select class="form-control selectric" name="status_rek">
                                            <option value="">Status Aktivasi</option>
                                            <option value="enable">Activate</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-icon icon-right btn-primary">Submit <i class="fas fa-arrow-right"></i></button>
                            </form>
                            @else
                            <form action="{{ route('admin.detail-rekening.post', $rek->id) }}" method="post">
                                @csrf
                                <div class="form-group ">
                                    <label class="text-md-right text-left mt-2">Aktivasi Rekening</label>
                                    <div class="">
                                        <select class="form-control selectric" name="status_rek">
                                            <option value="">Status Aktivasi</option>
                                            <option value="enable" {{ $rek->status_rek == 'enable' ? 'selected' : '' }}>Enable</option>
                                            <option value="disable">Disable</option>
                                            <option value="blocked">Block</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-icon icon-right btn-primary">Submit <i class="fas fa-arrow-right"></i></button>
                            </form>
                            @endif
                        </div>
                        <div class="w-100 d-sm-none"></div>
                        <div class="float-right mt-sm-0 mt-3">
                          {{-- <a href="#" class="btn">Ubah Pin <i class="fas fa-chevron-right"></i></a> --}}
                        </div>
                      </div>
                </div>
                <div class="card-footer text-center">
                    <span>Copyright © Seventeen Bank</span>
                </div>
            </div>
              @endforeach
        </div>
    </section>
</div>
@endsection
