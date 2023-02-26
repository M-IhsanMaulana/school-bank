@extends('user')
@section('title', 'Buat Rekening')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Buat Rekening</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Rekening</a></div>
                <div class="breadcrumb-item">Buat Rekening</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Buat dan Ajukan Rekening Anda</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-success">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Data Pribadi
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-success">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Create an App
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Server Information
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="wizard-content mt-2 needs-validation" action="{{ route('user.create-rekening.post') }}" method="POST" novalidate="">
                                @csrf
                                <div class="wizard-pane">
                                    <div class="card card-secondary">
                                        <div class="card-header text-center justify-content-center">
                                            <h4 class="text-center">Confirmation</h4>
                                        </div>
                                        <div class="card-body">
                                            <p>Hello <strong>{{ $rekening->nama_lengkap }}</strong> dengan membuat rekening ini berarti anda menyetujui peraturan yang berlaku yaitu</p>
                                            <ul>
                                                <li>Data diri yang telah dimasukan tidak dapat diubah kecuali dengan permohonan ke admin</li>
                                                <li>Nasabah bertanggung jawab atas transaksi yang terjadi di rekening tersebut</li>
                                                <li>Tidak boleh dan berkenan untuk membagikan atau menyalahgunakan rekening</li>
                                            </ul>
                                            <p>Dari peraturan diatas saya menyetujui jika terjadi pelanggaran saya berhak mendapatkan sanksi</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="form-group row">
                                                <div class="col-md-4"></div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                                                        <label class="custom-control-label" for="agree">Saya Setuju, atas persyaratan yang tertera</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group align-items-center justify-content-center">
                                        <a href="{{ route('user.create-step-2') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-left"></i> Back </a>
                                        <button type="submit" class="btn btn-icon icon-right btn-primary float-right">Submit <i class="fas fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
