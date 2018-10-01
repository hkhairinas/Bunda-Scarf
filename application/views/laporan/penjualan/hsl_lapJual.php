<p>Periode : <?php echo $tglAwal .' s/d '. $tglAkhir ?></p>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal Penjualan</th>
        <th>Kode Penjualan</th>
        <th>Nama Pelanggan</th>
        <th>Total Belanja</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $hasil = 0;
    $no=1;
        if(isset($dateHsl)){
        foreach($dateHsl as $data){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->TANGGAL_PENJUALAN; ?></td>
                <td><?php echo $data->ID_PENJUALAN; ?></td>
                <td><?php echo $data->NAMA_CUST; ?></td>
                <td>Rp. <?php echo number_format($data->TOTAL); ?></td>
            </tr>
                
                
        <?php $hasil = $hasil + $data->TOTAL; } ?> 
            <tr>
                <td colspan="4" class="info"><center><strong>Total Seluruh Penjualan</strong></center></td>
                <td>Rp. <?php echo number_format($hasil); ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>

<hr/>

<a class="btn btn-info pull-right" type="submit" href="<?php echo site_url('laporan/cetaklapJual/');?>">
    <i class="fa fa-print"></i> Cetak
</a>