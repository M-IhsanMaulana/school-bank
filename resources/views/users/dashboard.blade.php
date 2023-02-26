@extends('user')
@section('title', 'Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard User</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{-- {{ $user->count() }} --}}3
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-bank"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Rekening</h4>
                        </div>
                        <div class="card-body">
                            {{ $rekening->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-list-ul"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Pengajuan</h4>
                        </div>
                        <div class="card-body">
                            {{-- {{ $rekening->count() }} --}}1
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Uang</h4>
                        </div>
                        @foreach ($rekening as $rek)
                        <div class="card-body">
                            Rp. {{ $rek->total_saldo }},-
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Activities</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">Now</div>
                                    <div class="media-title">Farhan A Mujib</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-2.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">12m</div>
                                    <div class="media-title">Ujang Maman</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-3.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">17m</div>
                                    <div class="media-title">Rizal Fakhri</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-4.png" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">21m</div>
                                    <div class="media-title">Alfa Zulkarnain</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                        </ul>
                        <div class="text-center pt-1 pb-1">
                            <a href="#" class="btn btn-primary btn-lg btn-round">
                                View All
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
