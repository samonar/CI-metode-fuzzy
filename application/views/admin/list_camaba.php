<style>
.hidetext { -webkit-text-security: disc; /* Default */ }
</style>
<a href="<?php echo base_url('fuzy/create/') ?>">
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
                    <th style="text-align: center; width: 10 px;">Nama</th>
                    <th style="text-align: center; ">NIM</th>
                    <th style="text-align: center; ">IPK</th>
                    <th style="text-align: center">Hadir</th>
                    <th style="text-align: center">Hasil Fuzy</th>
                    <th style="text-align: center; width: 18%;">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
        $i=1;
        $fuzyke=0;
        foreach ($list_mahasiswa as $key) {
            ?> 
            <tr>
                <td><?php echo $i++ ?> </td>
                <td><?php echo $key->nama ?></td>
                <td><?php echo $key->NIM ?></td>
                <td><?php echo $key->IPK ?></td>
                <td><?php echo $key->hadir ?></td>
                <td><?php echo substr($hasil[$fuzyke++],0,4) ?></td>
                <td style="text-align: center">
                    <a href="<?php echo base_url('fuzy/delete/'.$key->id)?>" onclick="return checkDelete()">
                    <span class="text-danger" style="font-size:21px">
                                <i class="fa fa-trash"></i>
                        </span>
                    </a> 
                </td>
            </tr>
            <?php 
        }
        ?>
        </tbody>
    </table>
    <script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
    </script>