<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Filter Arsip Kategori
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
            <h3 class="box-title"><?=$judul?></h3>

            <div class="pull-right">

              <a href="<?=base_url('kategori')?>"><i class="fa fa-undo btn-flat btn btn-secondary"> Back</i></a>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Arsip</th>
                  <th>Tanggal Upload</th>
                  <th>Deskripsi</th>
                  <!-- <th>Nama User</th>
                  <th>Jabatan/bagian</th> -->
                  <th width="35%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              <?php foreach($row->result_array() as $key => $data) : ?>
                <tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$data['nama_arsip']?></td>
                  <td><?=$data['tgl_upload']?></td>
                  <td><?=$data['deskripsi']?></td>
                  <!-- <td><?=$data['username']?></td>
                  <td><?=$data['nama_jabatan']?></td> -->
                  <td class="text-center" width="160px">
                    
                    <form action="" method="post">

                      <a href="<?=base_url('assets/file_arsip/'.$data['file_arsip'])?>" target="_blank" class="btn btn-danger btn-md -btn-flat"><i class="fa fa-file-pdf-o fa-2x label-danger"></i> Lihat File Arsip</a> 
    
	 
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>

    </section>

