<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url('data_camaba/create/') ?>">
<button type="button" class="btn btn-outline-info btn-sm " style="margin-bottom: 10px;">
    Tambah User &nbsp
    <i class="fa fa-plus"></i> 
</button>
</a>


<table class="table table-bordered table-striped" id="example1">
        <thead>
            <tr>
                <tr>
                    <th style="text-align: center; width: 30px;">No</th>
                    <th style="text-align: center; width: 10 px;">Foto</th>
                    <th style="text-align: center; ">Nama Nasabah</th>
                    <th style="text-align: center; ">NIM</th>
                    <th style="text-align: center">No HP</th>
                    <th style="text-align: center">Prodi</th>
                    <th style="text-align: center">Pleton</th>
                    <th style="text-align: center; width: 18%;">Action</th>
            </tr>
        </thead>

        <tbody>
       
        </tbody>
    </table>
    <script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
    </script>