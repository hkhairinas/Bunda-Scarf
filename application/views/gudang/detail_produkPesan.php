
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
    <h1 class="page-header">Detail Produk</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
        <?php
        foreach($product as $data){
        ?>
        <div class="form-group">
            <label class="col-md-4">ID Produk</label>
            <div class="col-md-5">
                <input name="id_prod" class="form-control" type="text" value="<?php echo $data->ID_PROD; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Nama Produk</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo $data->NAMA_PROD; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Modal</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo $data->HARGA_BELI; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Harga</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo $data->HARGA_JUAL; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Supplier</label>
            <div class="col-md-5">
                <input name="stok" class="form-control" type="text" value="<?php echo $data->NAMA_SUPP; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group has-error">
            <label class="col-md-4">Stok Tersedia</label>
            <div class="col-md-5">
                <input name="stok" class="form-control" type="text" value="<?php echo $data->STOK; ?>" readonly="readonly">
            </div>
        </div>


        <?php } ?>
        <div class="form-group">
        <br>
        <input type="button" class="btn btn-default" value="Kembali" onclick="history.back(-1)" />
        </div>

</div>

</div>
</div>