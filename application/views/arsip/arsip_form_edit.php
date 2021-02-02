<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Arsip
        <small>Arsip</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-archive"></i></a></li>
        <li class="active">Arsip</li>
      </ol>
    </section>

      <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Data Arsip</h3>

            <div class="pull-right">
              <a href="<?=site_url('arsip');?>" class="btn btn-flat"> 
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>

            <div class="box-body">
              <div class="row">
              <div class="col-md-4 col-md-offset-4">
              <?php echo form_open_multipart('arsip/prosesEdit/'. $arsip['id_arsip']);?>
                  <div class="form-group <?=form_error('no_arsip')? 'has-error' : null?>">
                     <label for="no_arsip">No. Arsip</label>
                     <input type="hidden" name="id_arsip" value="<?=$arsip['id_arsip']?>">
                     <input class="form-control" type="text" name="no_arsip" id="no_arsip" value="<?=$this->input->post('no_arsip') ? $this->input->post('no_arsip'): $arsip['no_arsip']?>"><?=form_error('no_arsip')?>
                     <!-- <input type="hidden" name="id_buku" value="<?=set_value('id_sampul')?>"> -->
                   </div>
                  <div class="form-group <?=form_error('nama_arsip')? 'has-error' : null?>">
                     <label for="nama_arsip">Nama Arsip</label>       
                     <input class="form-control" type="text" name="nama_arsip" id="nama_arsip" value="<?=$this->input->post('nama_arsip') ? $this->input->post('nama_arsip'): $arsip['nama_arsip']?>"><?=form_error('nama_arsip')?>
                   </div>
                    <div class="form-group <?=form_error('id_kategori')? 'has-error' : null?>">
                     <label>Kategori *</label>
                     <select class="form-control" name="id_kategori">
                     <option value="<?= $arsip['id_kategori'] ?>"><?=$arsip['nama_arsip']?></option>
                       <?php foreach($kategori->result() as $key => $data) : ?>
                          <option value="<?= $data->id_kategori ?>"><?= $data->nama_kategori?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>
                   
                   <div class="form-group <?=form_error('deskripsi')? 'has-error' : null?>">
                     <label for="deskripsi">Deskripsi *</label>
                     <textarea class="form-control" name="deskripsi" id="deskripsi" cols="53" rows="4" value="<?=$this->input->post('deskripsi') ? $this->input->post('deskripsi'): $arsip['deskripsi']?>"><?=$arsip['deskripsi']?><?=form_error('deskripsi')?></textarea>
                   </div>

                   <div class="form-group <?=form_error('file_arsip')? 'has-error' : null?>">
                     <label for="file_arsip">File Arsip*</label>
                     <input type="hidden" name="old_file" value="<?=$arsip['file_arsip']?>">
                     <input class="form-control" type="file" name="file_arsip" id="file_arsip" value="$arsip['file_arsip']?>" required><?=form_error('file_arsip')?>
                     <small><?=$arsip['file_arsip']?></small>
                     <label class="text-danger">*File Harus Format .Pdf</label>
                   </div>

                   <div class="form-group">
                   <button type="submit" name="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                   <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                   </div>
                <?= form_close() ?>

        </div>
      </section>


