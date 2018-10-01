
<div id="page-wrapper">
<br>
<div class="col-sm-3"></div>
    <div class="col-md-6">
    <div class="panel panel-default">
    <div class="panel-body">
        <div class="form-group">
        
            <?php
                foreach($product as $detail){
                ?>
                <?php echo form_open('gudang/updateProduKDb'); ?>
                <h2 class="page-header">Edit Produk</h2>
                <label></label>
                <input class="form-control" type="hidden" value="<?php echo $detail->ID_PROD; ?>" name="id_prod" />

                <label></label>
                <input class="form-control" type="text" name="nama" placeholder="Nama Produk" class="form-control" value="<?php echo $detail->NAMA_PROD;?>" />

                <label></label>
                <input class="form-control" type="text" name="stok" placeholder="STOK" class="form-control" value="<?php echo $detail->STOK;?>" readonly/>

                <label></label>
                <input class="form-control" type="number" name="hrgb" id="hrgb" placeholder="Harga Beli dalam Rp" class="form-control" value="<?php echo $detail->HARGA_BELI;?>" readonly/>

                <label></label>
                <input class="form-control" type="number" name="hrgj" id="hrgj" placeholder="Harga Jual dalam Rp" class="form-control" value="<?php echo $detail->HARGA_JUAL;?>" readonly />
                <br>
                <button class="btn btn-md btn-primary" type="submit">Edit</button>
                <button class="btn btn-md btn-danger" type="reset" value="" onclick="history.back(-1)">Batal</button>
                <?php echo form_close(); ?>
                <?php
                }    
            ?>
        </div>
    </div>
    </div>
    </div>
<div class="col-sm-3"></div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#hrgb").keyup(function(){
        var hrgbeli = $("#hrgb").val();
        var hargajual = parseInt(hrgbeli)+parseInt(hrgbeli*(20/100));
        $("#hrgj").val(hargajual);
    });
})
</script>