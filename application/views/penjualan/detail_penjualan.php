
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
    <h1 class="page-header">Detail Penjualan</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
        <?php
        foreach($jual as $data){
        ?>
        <div class="form-group">
            <label class="col-md-4">Kode Penjualan</label>
            <div class="col-md-5">
                <input name="id_prod" class="form-control" type="text" value="<?php echo $data->ID_PENJUALAN; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Nama Pelanggan</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo $data->NAMA_CUST; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Nama Produk</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo $data->NAMA_PROD; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Harga</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo number_format($data->HARGA_JUAL); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Jumlah</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo number_format($data->JUMLAH); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Total</label>
            <div class="col-md-5">
                <input name="stok" class="form-control" type="text" value="<?php echo number_format($data->TOTAL); ?>" readonly="readonly">
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