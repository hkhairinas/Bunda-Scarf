
<div id="page-wrapper">
<div class="row">
 <div class="col-lg-12">
    <h1 class="page-header">Detail Pembelian</h1>
 </div>
 </div>
<div class="panel panel-default">
<div class="panel-body">
        <?php
        $hasil=0;
        foreach($beli as $data){
        ?>
        <div class="form-group">
            <label class="col-md-4">Kode Pembelian</label>
            <div class="col-md-5">
                <input name="id_prod" class="form-control" type="text" value="<?php echo $data->ID_PEMBELIAN; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Nama Supplier</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo $data->NAMA_SUPP; ?>" readonly="readonly">
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
                <input name="nama_prod" class="form-control" type="text" value="Rp. <?php echo number_format($data->HARGA_BELI); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Jumlah</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo $data->JUMLAH; ?>" readonly="readonly">
            </div>
        </div>
        <?php $hasil = $data->HARGA_BELI * $data->JUMLAH; } ?>
        <div class="form-group">
            <label class="col-md-4">Total Pembelian</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="Rp. <?php echo number_format($hasil); ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
        <br>
        <input type="button" class="btn btn-default" value="Kembali" onclick="history.back(-1)" />
        </div>

</div>

</div>
</div>