<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
        <small>Kategori</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-archive"></i></a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Kategori</h3>

            <div class="pull-right">
              <a href="<?=site_url('kategori');?>" class="btn btn-flat"> 
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>

           <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">

                <form action="" method="post">
                   <div class="form-group <?=form_error('nama_kategori')? 'has-error' : null?>">
                     <label for="name">Nama Kategori *</label>
                     <input type="hidden" name="id_kategori" value="<?=$row->id_kategori?>">
                     <input class="form-control" type="text" name="nama_kategori" id="nama_kategori" value="<?=$this->input->post('nama_kategori') ? $this->input->post('nama_kategori'): $row->nama_kategori?>"><?=form_error('nama_kategori')?>
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