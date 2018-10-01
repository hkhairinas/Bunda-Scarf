<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal Pembelian</th>
        <th>Kode Pembelian</th>
        <th>Nama Supplier</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
        if(isset($dateHsl)){
        foreach($dateHsl as $data){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->TANGGAL_PEMBELIAN; ?></td>
                <td><?php echo $data->ID_PEMBELIAN; ?></td>
                <td><?php echo $data->NAMA_SUPP; ?></td>
            </tr>  
        <?php } ?>
        <?php } ?>
    </tbody>
</table>

<hr/>
<!-- onClick="window.print()" -->
<a class="btn btn-info pull-right" type="submit" href="<?php echo site_url('laporan/cetaklapBeli');?>">
    <i class="fa fa-print"></i> Cetak
</a>