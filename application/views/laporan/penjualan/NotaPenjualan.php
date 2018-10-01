<br>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body onload="window.print();">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-md-4">
            <img class="img-responsive" src="<?php echo base_url('assets/uploads/logo-lap.png') ?>" style="float: left;"></img>
        </div>
        
        <div class="page-header" align="center">
            <b><h2>Toko Bunda Scarf</h2></b>
            <small><u>Jl. Raya Km.4 Perawang</u></small>
            <small>No Hp. 081220848525 / 082172834xxx</small>
            <small>Menjual : Berbagai Macam Jilbab, Gordyn, dll.</small>
        </div>
        <div class="col-md-3">

            <STRONG>No Nota : <?php echo $id_jual;?></STRONG>
        </div>
        <div class="col-md-6"><STRONG>KASIR :</STRONG> <?php echo $kasir;?></div>
        <div class="col-md-3"><STRONG>Tanggal :</STRONG><?php echo $tgl_jual;?></div>
        <table class="table table-bordered table-striped" width="100%">

        <hr>

            <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga @</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <?php 
            $no=1;
            foreach($cetak as $data){
            $sub = $data->JUMLAH * $data->HARGA_JUAL;
             ?>
            <tbody>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data->NAMA_PROD; ?></td>
                <td><?php echo $data->JUMLAH; ?></td>
                <td>Rp. <?php echo number_format($data->HARGA_JUAL); ?></td>
                <td>Rp. <?php echo number_format($sub); ?></td>
            </tr>
            <?php } ?>    
            <tr>
                <td colspan="3"></td>
                <td colspan="1"><strong> Total </strong></td>
                <td class="success">Rp. <?php echo number_format($data->TOTAL); ?></td>
            </tr>
            <tr>
                <td colspan="3"><strong> Pelanggan : </strong> <?php echo $data->NAMA_CUST; ?></td>
                <td colspan="1"><strong> Diskon</strong></td>
                <td class="success"><?php echo $data->DISK; ?> %</td>
            </tr>
            <tr>
                <td colspan="4" class="info"><center><strong> Total Penjualan </strong></center></td>
                <td class="success">Rp. <?php echo number_format($data->TOTAL_DISK); ?></td>
            </tr>
            </tbody>  
        </table>
        <div class="pull-right">
        <strong>Hormat Kami</strong>
        <br><br><br>
        <?php echo ucfirst($kasir);?>
        </div>
        
    </div>
</div>
</div>
<div class="col-md-2"></div>
</body>
</html>