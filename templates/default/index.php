<?php load_templates('layouts/top') ?>
<div class="content">
    <div class="panel-header <?=config('theme')['panel_color']?>">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Ini adalah halaman dashboar</h5>
                </div>
                <!-- <div class="ml-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                    <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
                </div> -->
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            
            <div class="col-md-3">
                <div class="card full-height">
                    <div class="card-body">
                        
                        <div class="card-title">Data Guru</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-info op-8">Total</h6>
                                    <h3 class="fw-bold"></h3>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Data Siswa</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-warning op-8">Total</h6>
                                    <h3 class="fw-bold"></h3>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Data Orang tua</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-warning op-8">Total</h6>
                                    <h3 class="fw-bold"></h3>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Range Hasil</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total</h6>
                                    <h3 class="fw-bold"></h3>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <h1><?php echo '<pre>' . PHP_EOL; var_dump(auth()->role_id)?></h1> -->
           
        </div>

    </div>
</div>
<?php load_templates('layouts/bottom') ?>