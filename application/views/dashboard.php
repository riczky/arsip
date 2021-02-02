<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main Content -->
    <section class="content">
       <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->fungsi->count_arsip()?></h3>

              <p>Arsip</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-archive"></i>
            </div>
            <a href="<?=base_url('arsip')?>" class="small-box-footer">
              Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$this->fungsi->count_kategori()?><sup style="font-size: 20px"></sup></h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
            <a href="<?=base_url('kategori')?>" class="small-box-footer">
              Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->fungsi->count_jabatan()?></h3>

              <p>Jabatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="<?=base_url('jabatan')?>" class="small-box-footer">
              Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->fungsi->count_user()?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=base_url('user')?>" class="small-box-footer">
              Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->

        



  

      </div>
      <!-- /.row -->



   
    </section>

    </section>