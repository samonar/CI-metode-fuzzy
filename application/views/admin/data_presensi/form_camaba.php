<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center" s="">
                    Tambah Siswa(individu)
                    </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                <form action="http://localhost/pkkm-bck/data_camaba/create_action/3" method="post" enctype="multipart/form-data" class="col-md-12 ">
                    <div class="form-group row">
                            <label class="col-md-4 ">Nama Camaba </label>
                            <div class="col-md-8">
                                <input type="text" name="nama" id="nama" class="form-control" value="" placeholder="Nama" required="">
                            </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-4 ">NIM </label>
                            <div class="col-md-8">
                                <input type="text" name="nim" id="nama" class="form-control" value="" placeholder="Nama" required="">
                            </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-md-4">No HP</label>
                        <div class="col-md-8">
                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Prodi</label>
                        <div class="col-md-8">
                            <select name="id_prodi" id="idprodi" class="form-control">
                            <option selected="" disabled="">--Pilih Prodi--</option>
                                                                    <option value="3">Teknik Sipil</option>
                                                                    <option value="5">Agribisnis</option>
                                                                    <option value="7">Teknik Informatika</option>
                                                                    <option value="8">Teknik Mesin</option>
                                                                    <option value="9">Manajemen Bisnis Pariwisata</option>
                                                                    <option value="10">Teknologi Pengolahan Hasil Ternak</option>
                                                                    <option value="11">Teknik Manufaktur Perkapalan</option>
                                                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4">Pleton</label>
                        <div class="col-md-8">
                            <input type="text" name="id_pleton" id="id_pleton" class="form-control" placeholder="Pleton" value="" required="">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                            <label class="col-md-4 ">Foto</label>
                            <div class="col-md-7">
                                <input type="file" name="foto" id="foto" class="form-control" value="" placeholder="Masukkan foto" >
                            </div>
                    </div> -->


                        <button type="cancel" class="btn btn-default ">
                            <a href="http://localhost/pkkm-bck/data_camaba/read_mabaProdi/3">Cancel</a>
                        </button>
                        <button type="submit" class="btn btn-info float-right">Simpan</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col-->
    <div class="col-md-6 ">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center">
                    Tambah Siswa(File)
                    </h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body" style="margin-top: 10%;">
                    <div class="container">
                                           


                    <form action="http://localhost/pkkm-bck/excel/upload/3" class="form-group" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="row padall">
                            <div class="col-lg-9 order-lg-1">
                                <div class="form-group">
                                    <div class="input-group input-file" name="Fichier1">
                                        <input type="file" class="form-control-file" name="fileURL" id="exampleFormControlFile1" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:7%">
                            <div class="col-lg-3 order-lg-2">
                                <button type="cancel" name="import" class="float-left btn btn-default ">cancel</button>
                            </div>
                            <div class="col-lg-8 order-lg-2">
                                <button type="submit" name="import" class="float-right btn btn-info">Import</button>
                            </div> 
                        </div>
                    </form>
                        
                        
                    
                    </div>
                    <div class="">  
                        <div class="col-lg-12" style="margin-top: 10%;">
                            <div class="float-left">  
                                <h6>format file :</h6>
                            </div> 
                            <div class="float-left" style="margin-left: 7%;">  
                                <a href="http://localhost/pkkm-bck/assets/uploads/sample-xlsx.xlsx" class="btn btn-info btn-sm"><i class="fas fa-file-excel"></i> Sample .XLSX</a>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

    </div>
    <!-- ./row -->
</section>