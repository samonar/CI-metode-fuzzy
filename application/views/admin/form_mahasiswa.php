<section class="content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center" s="">
                    Tambah Siswa(individu)
                    </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <form action="<?php echo site_url('fuzy/create_action') ?>" method="post" enctype="multipart/form-data" class="col-md-12 ">
                    <div class="form-group row">
                            <label class="col-md-4 ">Nama Camaba </label>
                            <div class="col-md-8">
                                <input type="text" name="nama" id="nama" class="form-control" value="" placeholder="Nama" required="">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-4 ">NIM </label>
                            <div class="col-md-8">
                                <input type="number" name="nim" id="nama" class="form-control" value="" placeholder="NIM" required="">
                            </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-md-4">IPK</label>
                        <div class="col-md-8">
                            <input type="text" name="ipk" id="no_hp" class="form-control" placeholder="IPK('3.53')" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Kehadiran</label>
                        <div class="col-md-8">
                            <input type="text" name="hadir"  class="form-control" placeholder="Nilai Kehadiran (dalam %, 40)" value="" required="">
                        </div>
                    </div>
                    
                        <!-- <button type="cancel" class="btn btn-default ">
                            <a href="$this">Cancel</a>
                        </button> -->
                        <?php echo anchor(site_url('fuzy'),'cancel', 'class="btn btn-danger"'); ?>
                        <button type="submit" class="btn btn-info float-right">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col-->
   
    <!-- ./row -->
</section>