<div class="content-inner">
    <!-- Page Header-->
    <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">Dashboard</h2>
        </div>
    </header>
    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <button type="button" class="btn btn-outline">
                            <div class="icon bg-blue"><i class="fa fa-cubes"></i></div>
                        </button>
                        <div class="title"><span>Total Produk</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-blue"></div>
                            </div>
                        </div>
                        <div class="number"><strong><?= $total_produk ?></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <button type="button" class="btn btn-outline">
                            <div class="icon bg-green "><i class="fa fa-cubes"></i></div>
                        </button>
                        <div class="title"><span>Produk Tersedia</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="70"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                        <div class="number"><strong><?= $total_produk_ada ?></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-4 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <button type="button" class="btn btn-outline">
                            <div class="icon bg-red"><i class="fa fa-cubes"></i></div>
                        </button>
                        <div class="title"><span>Produk Habis</span>
                            <div class="progress">
                                <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="40"
                                    aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                            </div>
                        </div>
                        <div class="number"><strong><?= $total_produk_habis ?></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <!-- <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Total Pegawai</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong>50</strong></div>
                  </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-4 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-red"><i class="icon-padnote"></i></div>
                        <div class="text"><strong><?= $hari ?></strong><br><small>Transaksi Hari ini</small></div>
                    </div>
                </div>
                <div class="statistics col-lg-4 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
                        <div class="text"><strong><?= $bulan ?></strong><br><small>Tranksaksi Bulan ini</small></div>
                    </div>
                </div>
                <div class="statistics col-lg-4 col-12">
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                        <div class="icon bg-orange"><i class="fa fa-users"></i></div>
                        <div class="text"><strong><?= $total_user ?></strong><br><small>Jumlah Pegawai</small></div>
                    </div>
                </div>
                <!-- Line Chart -->
                <!-- <div class="chart col-lg-6 col-12">
                  <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <canvas id="lineCahrt"></canvas>
                  </div>
                </div>
                <div class="chart col-lg-3 col-12"> -->
                <!-- Bar Chart   -->
                <!-- <div class="bar-chart has-shadow bg-white">
                    <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
                    <canvas id="barChartHome"></canvas>
                  </div> -->
                <!-- Numbers-->
                <!-- <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
                    <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
                  </div> -->
            </div>
        </div>
</div>
</section>