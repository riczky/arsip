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
     <?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Kategori</h3>

            <div class="pull-right">

              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus"></i> Add Kategori
              </button>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kategori</th>
                  <th width="35%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              <?php foreach($row->result_array() as $key => $data) : ?>
                <tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$data['nama_kategori']?></td>
                  <td class="text-center" width="160px">
                    
                    <form action="<?=site_url('kategori/del') ?>" method="post">

                      <a href="<?=site_url('kategori/detail/'. $data['id_kategori'])?>" class="btn btn-info btn-xs"> Filter Arsip</a> 
    
	                      
	                    <a href="<?=site_url('kategori/edit/'. $data['id_kategori']);?>" class="btn btn-warning btn-xs"> 
                        <i class="fa fa-pencil"></i> Update</a>
	                    
                      	<input type="hidden" name="id_kategori" value="<?=$data['id_kategori'];?>">
                        <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs"> 
                          <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>

    </section>


<!-- Modal Add Kategori -->

        <div class="modal modal-info fade" id="add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Kategori</h4>
              </div>
              <div class="modal-body">
                <?= form_open('kategori/add') ?>
                <div class="form-group">
                	<label>Kategori</label>
                	<input type="text" class="form-control" name="nama_kategori" placeholder="Kategori" required>
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Simpan</button>
              </div>
              <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

