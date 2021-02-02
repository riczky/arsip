<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Arsip
        <small>Arsip</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file_archive"></i></a></li>
        <li class="active">Arsip</li>
      </ol>
    </section>

     <!-- Main Content -->
    <section class="content">
     <?php $this->view('messages') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Arsip</h3>

            <div class="pull-right">
              <a href="<?=site_url('arsip/add');?>" class="btn btn-primary btn-flat"> 
                <i class="fa fa-plus"></i> Create
              </a>
            </div>
          </div>
<div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No. Arsip</th>
                  <th>Nama Arsip</th>
                  <th>Kategori</th>
                  <th>Tgl. Upload</th>
                  <th>Deskripsi</th>
                  <th>Nama User</th>
                  <th>Jabatan/Bagian</th>
                  <th>File</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                 <?php $no = 1; ?>
              <?php foreach($arsip->result() as $key => $data) : ?>
                <tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$data->no_arsip?></td>
                  <td><?=$data->nama_arsip?></td>
                  <td><?=$data->nama_kategori?></td>
                  <td><?=$data->tgl_upload?></td>
                  <td><?=$data->deskripsi?></td>
                  <td><?=$data->username?></td>
                  <td><?=$data->nama_jabatan?></td>
                   <td class="text-center"><a href="<?=base_url('assets/file_arsip/'.$data->file_arsip)?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                                    <!-- <?= number_format($data->ukuran_file, 0)  ?> Byte -->
                    </td>
                  
                  
                  <td class="text-center" width="160px">
                    <form action="<?=site_url('arsip/del/'. $data->id_arsip) ?>" method="post">
                      <a href="<?=site_url('arsip/edit/'. $data->id_arsip);?>" class="btn btn-warning btn-xs"> 
                        <i class="fa fa-pencil"></i> Update</a>
                        <input type="hidden" name="id_arsip" value="<?=$data->id_arsip;?>">
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