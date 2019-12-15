<div class="card-body">
<?php echo form_open_multipart('info/posting');?>
<div class=" mb-2 col-4">
    <input type="text" name="informasi" placeholder=" Judul..."class="form-control" value="" required>
</div>
<div class=" mb-2 col-4">
    <select name="panitia" id="" class="form-control">
        <?php 
        foreach ($dataPanitia as $key ) {?>
            <option value="<?= $key->id_panitia ?>"> <?= $key->nama_panitia ?> </option>    
        <?php }
        ?>
    </select>
</div>
<div class="mb-3">
<textarea id="editor1" name="keterangan" style="width: 100%"></textarea>
</div>
<div class="form-group">
    <div class="col-md-6">
    <button type="submit" class="btn btn-primary">Cancel</button>
    <button id="send" type="submit" class="btn btn-success">Submit</button>
    </div>
</div>

<?php echo form_close()?>
</div>