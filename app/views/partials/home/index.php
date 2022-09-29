<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Dashboard</h4>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                </div>
                <div class="col-md-3 ">
                    <?php $rec_count = $comp_model->getcount_users();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tbl_users/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-users "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Users</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ">
                    <?php $rec_count = $comp_model->getcount_instansi();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tbl_instansi/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-institution "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Instansi</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 ">
                    <?php $rec_count = $comp_model->getcount_suratmasuk();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tbl_surat_masuk/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Surat Masuk</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 comp-grid">
                    <?php $rec_count = $comp_model->getcount_suratkeluar();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tbl_surat_keluar/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Surat Keluar</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->piechart_suratmasuk();
                        ?>
                        <div>
                            <h4>Surat Masuk</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="piechart_suratmasuk"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Surat Masuk',
                            backgroundColor:'<?php echo random_color(0,9); ?>',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('piechart_suratmasuk');
                            var chart = new Chart(ctx, {
                            type:'pie',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
                <div class="col-md-6 comp-grid">
                    <div class="card card-body">
                        <?php 
                        $chartdata = $comp_model->doughnutchart_suratkeluar();
                        ?>
                        <div>
                            <h4>Surat Keluar</h4>
                            <small class="text-muted"></small>
                        </div>
                        <hr />
                        <canvas id="doughnutchart_suratkeluar"></canvas>
                        <script>
                            $(function (){
                            var chartData = {
                            labels : <?php echo json_encode($chartdata['labels']); ?>,
                            datasets : [
                            {
                            label: 'Surat Keluar',
                            backgroundColor:'<?php echo random_color(0,9); ?>',
                            borderWidth:3,
                            data : <?php echo json_encode($chartdata['datasets'][0]); ?>,
                            }
                            ]
                            }
                            var ctx = document.getElementById('doughnutchart_suratkeluar');
                            var chart = new Chart(ctx, {
                            type:'doughnut',
                            data: chartData,
                            options: {
                            responsive: true,
                            scales: {
                            yAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            xAxes: [{
                            ticks:{display: false},
                            gridLines:{display: false},
                            scaleLabel: {
                            display: true,
                            labelString: ""
                            }
                            }],
                            },
                            }
                            ,
                            })});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
