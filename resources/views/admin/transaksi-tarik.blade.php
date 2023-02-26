@extends('admin')
@section('title', 'Tarik Tunai')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Transaksi Tarik Tunai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Tarik Tunai</div>
                </div>
            </div>
            @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="section-body">
                <div class="section-body">
                    <h2 class="section-title">Transaksi Nasabah /User</h2>
                    <p class="section-lead">
                        Silahkan masukan nomor rekening pada kolom dibawah dan masukan transaksi nya di kolom sebelahnya.
                    </p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card">
                                <form method="post" class="needs-validation" novalidate="">
                                    <div class="card-header">
                                        <h4>Cek Data Rekening</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Cari Data - Masukan No Rekening</label>
                                            <select class="form-control select2" id="findrekening">
                                                <option value="1">Cari</option>
                                                @foreach ($data as $rekening)
                                                    <option value="{{ $rekening->no_rekening }}">
                                                        {{ $rekening->no_rekening }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span id="muncul" class="text-center text-success text-bold"></span>
                                        <strong><span id="muncul-error"
                                                class="text-center text-danger text-bold"></span></strong>
                                    </div>
                                    <div class="card-footer text-center">
                                        <span class="text-muted">Silahkan pilih nomor rekening atau ketikan pada kolom
                                            select diatas</span>
                                    </div>
                                </form>
                            </div>
                            <div class="card author-box">
                                <div class="card-header">
                                    <h4>Data Nasabah / User</h4>
                                </div>
                                <div class="card-body">
                                    <div class="author-box-left">
                                        <img alt="image" src="{{ asset('assets/img/seventeen-bank.svg') }}"
                                            class="rounded-circle author-box-picture border border-primary">
                                        <div class="clearfix"></div>
                                        <span class="badge badge-secondary m-2" id="default-status">status ?</span>
                                        <span class="badge badge-success m-2" id="success-status"></span>
                                        <span class="badge badge-warning m-2" id="disable-status"></span>
                                        <span class="badge badge-danger m-2" id="blocked-status"></span>
                                    </div>
                                    <div class="author-box-details">
                                        <div class="author-box-name">
                                            <a href="#" id="nama-penarik">Seventeen Bank</a>
                                        </div>
                                        <div class="author-box-job">Join pada tanggal <span id="tgl_aktif"></span></div>
                                        <div class="author-box-description">
                                            <input type="text" class="form-control" id="saldo_total" value="000"
                                                disabled>
                                            <span id="datamu"></span>
                                        </div>
                                        <div class="w-100 d-sm-none"></div>
                                        <div class="float-right mt-sm-0 mt-3">
                                            <a href="#" class="btn">Penarikan Uang <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <span>Copyright © Seventeen Bank</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="POST" action="{{ route('admin.transaksi.tarik') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Aksi Transaksi</h4>
                                        <hr>
                                        <span>Pastikan inputan anda sudah benar</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>No.Rekening</label>
                                            <input type="text" class="form-control" name="no_rek" id="no_rek"
                                                readonly tabindex="-1" required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Transaksi</label>
                                            <input type="text" class="form-control" name="jenis_transaksi"
                                                id="jenis_data" readonly tabindex="-1" required>
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Penarikan</label>
                                            <input type="number" class="form-control" name="jumlah_penarikan"
                                                tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                <i class="fas fa-warning"></i> Harap Masukan nominal penarikan nya !!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-money-bill-wave-alt"></i> Tarik Tunai</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
