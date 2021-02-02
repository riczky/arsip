<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Backup
        <small>Backup Database</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i></a></li>
        <li class="active">Backup Database</li>
      </ol>
    </section>


        <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Backup Database</h3>

            <div class="pull-right">
              <a href="<?=site_url('backup');?>" class="btn btn-flat"> 
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
                     <label>Backup Database </label><br>
                     <p>Lakukan Backup Database Secara Berkala Untuk Menghindari Kehilangan File Arsip Penting.</p>
                     <a href="<?=base_url('backup/backup_database')?>" class="btn btn-info btn-flat"><i class="fa fa-database"></i> Backup Now..</a> 
                   </div>
                    
                </form>
                </table>     
              </div>
            </div>

          </div>
        </div>

    </section>
