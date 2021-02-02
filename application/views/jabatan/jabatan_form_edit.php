<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Position
        <small>Jabatan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-building"></i></a></li>
        <li class="active">Jabatan</li>
      </ol>
    </section>

    <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit jabatan</h3>

            <div class="pull-right">
              <a href="<?=site_url('jabatan');?>" class="btn btn-flat"> 
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>

           <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">

                <form action="" method="post">
                   <div class="form-group <?=form_error('nama_jabatan')? 'has-error' : null?>">
                     <label for="name">Nama jabatan *</label>
                     <input type="hidden" name="id_jabatan" value="<?=$row->id_jabatan?>">
                     <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan" value="<?=$this->input->post('nama_jabatan') ? $this->input->post('nama_jabatan'): $row->nama_jabatan?>"><?=form_error('nama_jabatan')?>
                   </div>
                    <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                   <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                   </div>
             </form>     
              </div>
            </div>

          </div>
        </div>

    </section>