
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
            <label class="col-md-4">Kategori</label>
            <div class="col-md-5">
                <input name="stok" class="form-control" type="text" value="<?php echo $data->NAMA_KATEGORI; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Jenis Produk</label>
            <div class="col-md-5">
                <input name="stok" class="form-control" type="text" value="<?php echo $data->JENIS_PRODUK; ?>" readonly="readonly">
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
                <input name="harga" class="form-control" type="text" value="<?php echo number_format($data->HARGA_BELI); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Harga</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo number_format($data->HARGA_JUAL); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Stok Tersedia (S,M,L,XL,ALL SIZE)</label>
            <div class="col-md-1">
                <input name="s" class="form-control" type="text" value="<?php echo $data->S; ?>" readonly="readonly">
            </div>
            <div class="col-md-1">
                <input name="m" class="form-control" type="text" value="<?php echo $data->M; ?>" readonly="readonly">
            </div>
            <div class="col-md-1">
                <input name="l" class="form-control" type="text" value="<?php echo $data->L; ?>" readonly="readonly">
            </div>
            <div class="col-md-1">
                <input name="xl" class="form-control" type="text" value="<?php echo $data->XL; ?>" readonly="readonly">
            </div>
            <div class="col-md-1">
                <input name="as" class="form-control" type="text" value="<?php echo $data->ALL_SIZE; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Total Stok</label>
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