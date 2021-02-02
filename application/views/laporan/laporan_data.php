<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report
        <small>Laporan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-pie-chart"></i></a></li>
        <li class="active">Laporan</li>
      </ol>
    </section>

          <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Laporan Data Arsip</h3>

            <div class="pull-right">
              <a href="<?=site_url('laporan');?>" class="btn btn-flat"> 
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>

           <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <table class="table table-stripped table-bordered">
                <form action="" method="post">
                   <div class="form-group">
                     <label>Filter Laporan Data Arsip:</label><br><br>
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          Pilih Bulan
                        </div>
                      </div>
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          Tahun
                        </div>
                      </div>
                      <div class="panel panel-success">
                        <div class="panel-heading">
                          Kategori
                        </div>
                      </div>                     
                     <a href="<?=base_url('backup/backup_database')?>" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Cetak Laporan</a> 
                   </div>
                    
                </form>
                </table>     
              </div>
            </div>

          </div>
        </div>

    </section>


