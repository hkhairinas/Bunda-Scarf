<!-- CONTENT -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
     	<h1 class="page-header">Transaksi (Point Of Sales)</h1>
    </div>
    </div>
<div class="panel panel-default">
<div class="panel-body">	
    <form class="form-horizontal">
        <div class="form-group">
    		<label class="col-md-3">Kode Transaksi Penjualan</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" value=" <?php echo $id_penjualan; ?>" readonly>
                </div>
                <div class="col-md-2"></div>
            <label class="col-md-1">Kasir</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" value=" <?php echo $nama_user; ?>" readonly>
                </div>
        </div>
        <table class="table table-striped table-bordered">
        	<thead>
        		<tr>
        			<th>No</th>
        			<th>Kode Produk</th>
	                <th>Nama Produk</th>
	                <th>penjualan</th>
	                <th>Harga</th>
	                <th>Subtotal</th>
	                <th>
	                	<a href="#modalJualBarang" class="btn btn-default btn-block" data-toggle="modal">
                        <i class="fa fa-plus"></i> Transaksi</a>
                	</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php $i=1; $no=1;?>
            	<?php foreach($this->cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr class="gradeX">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $items['id']; ?></td>
                    <td><?php echo $items['name']; ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td class="hidden"><?php echo $items['s']?></td>
                    <td class="hidden"><?php echo $items['m']?></td>
                    <td class="hidden"><?php echo $items['l']?></td>
                    <td class="hidden"><?php echo $items['xl']?></td>
                    <td class="hidden"><?php echo $items['as']?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td>
                        <a class="btn btn-mini btn-danger btn-block delbutton" href="#" class="delbutton"
                           id="<?php echo 'tambah/'.$items['rowid'].'/'.$id_penjualan.'/'.$items['id'].'/'.$items['qty']; ?>">
                             Hapus <i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php $i++; $no++;?>
                <?php endforeach; ?>
        	</tbody>
        </table>
	</form>

	<form class="form-horizontal" action="<?php echo site_url('transaksi/simpan_penjualan') ?>" method="post">
	           <div class="form-group">
                    <label class="col-md-1"> <strong>Pelanggan</strong></label>
                        <div class="col-md-3">
                                <select id="id_pelanggan" tabindex="5" class="btn btn-default" name="id_pelanggan" data-placeholder="Pilih Pelanggan">
                                    <option value="000">--- Pilih Pelanggan ---</option>
                                    <?php
                                    if(isset($data_pelanggan)){
                                        foreach($data_pelanggan as $row){
                                            ?>
                                            <option value="<?php echo $row->ID_CUST?>"><?php echo $row->NAMA_CUST?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                        </div>

                    <label class="col-md-2"><strong>Diskon (%)</strong></label>
                        <div class="col-md-2">
                            <input type="text" class="uneditable-input input-block-level form-control"
                                   value="0" id="diskont" name="diskont" readonly>
                        </div>

                    <label class="col-md-2"><strong>Total Harga (Rp.)</strong></label>
                        <div class="col-md-2">
                            <input type="text" class="uneditable-input input-block-level form-control"
                                   value="<?php echo $this->cart->total(); ?> " id="tot" name="tot" readonly>
                            <input type="hidden" name="total" id="total" value="<?php echo $this->cart->total();?>">  
                            <input type="hidden" value="<?php echo $this->cart->total();?>" id="biasa" readonly> 
                            <input type="hidden" value=" " id="disk" readonly>   
                            <input type="hidden" name="id_penjualan" value="<?= $id_penjualan; ?>" readonly>
                            <input type="hidden" name="nm_barang" value="<?= $id_penjualan; ?>" readonly>
                            <input type="hidden" name="total_harga" value="<?= $this->cart->total()?>">
                            <input id="tanggal_penjualan" type="hidden" name="tanggal_penjualan" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
                        </div>
                        <!-- <div id="detail_pelanggan"></div>    -->  
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="form-group">
                        <label class="col-md-2"><strong>Bayar</strong></label>
                        <div class="col-md-2">
                            <input type="text" class="uneditable-input input-block-level form-control"
                                   value="" id="bayar">
                        </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="form-group">
                        <label class="col-md-2"><strong>Kembali</strong></label>
                        <div class="col-md-2">
                            <input type="text" class="uneditable-input input-block-level form-control"
                                   value="Rp.  " id="kembali" readonly>
                        </div>
                </div>
    	        <div class="panel-footer text-right">
    	            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan Transaksi </button>
    	            <a href="<?php echo site_url('transaksi')?>" class="btn btn-danger"> Batal <i class="fa fa-remove"></i></a>
    	        </div>
    </form>
</div>
</div>
</div>
</div>

 <!-- MODAL ADD PENJUALAN BARANG  -->
 <div class="modal fade" id="modalJualBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
    </div>
    <div class="modal-body">
        <form id="frm" name="frm" class="form-horizontal" method="post" action="<?php echo site_url('transaksi/tambah_penjualan_to_cart')?>">

        <!-- PEMILIHAN JENIS PRODUK -->
        <div class="form-group">
            <label class="col-md-4">Jenis Produk</label>
            <div class="col-md-5">
                <select id="id_kategori" class="form-control">
                    <option>--- Pilih Jenis Produk ---</option>
                    <?php
                        if(isset($data_kat)){
                            foreach($data_kat as $row){
                                ?>
                                <option value="<?php echo $row->ID_KATEGORI?>"><?php echo $row->NAMA_KATEGORI?></option>
                            <?php
                            }
                        }
                        ?>
                </select>
            </div>
        </div>

        <!-- PEMILIHAN PRODUK -->
        <div class="form-group">
                <label class="col-md-4">Daftar Produk</label>
                <div class="col-md-5">
                    <select id="ID_PROD" class="form-control" name="ID_PROD">
                        <option value=""> --- Pilih Produk --- </option>
                        <!-- <?php
                        if(isset($data_produk)){
                            foreach($data_produk as $row){
                                ?>
                                <option value="<?php echo $row->ID_PROD?>"><?php echo $row->NAMA_PROD?></option>
                            <?php
                            }
                        }
                        ?> -->
                    </select>
                </div>
        </div>   
          <div id="detail_produk" name="detail_produk"></div>     
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- ===========AJAX============ -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#id_kategori").change(function(){
            var id = $("#id_kategori").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_dProd');  ?>",
                data: "id_kategori="+id,
                cache:false,
                success: function(data){
                    $("#ID_PROD").html(data);
                    document.frm.add.disabled=false;
                }

            });
        });

        $("#ID_PROD").change(function(){
            var id= $("#id_kategori").val();
            var ID_PROD = $("#ID_PROD").val();

            if(id!=002){
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_dProduk'); ?>",
                data: "ID_PROD="+ID_PROD,
                cache:false,
                success: function(data){
                    $('#detail_produk').html(data);
                    document.frm.add.disabled=false;
                }
            });}
            else{
                    $.ajax({
                    type: "POST",
                    url : "<?php echo base_url('transaksi/get_dProduk2'); ?>",
                    data: "ID_PROD="+ID_PROD,
                    cache:false,
                    success: function(data){
                        $('#detail_produk').html(data);
                        document.frm.add.disabled=false;
                    }
                });
                }
        });

        $("#id_pelanggan").change(function(){
            var id_pelanggan = $("#id_pelanggan").val();
            var total = $("#total").val();
            var diskon = parseInt(total-(total*(5/100)));
            if(id_pelanggan!=0){
                $("#tot").val(diskon);
                $("#disk").val(diskon);
                $("#diskont").val(5);}
            else {
                $("#diskont").val(0);
                $("#tot").val(total);    }

            
            /*$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_dPelanggan'); ?>",
                data: "id_pelanggan="+id_pelanggan,
                cache:false,
                success: function(data){
                    $('#detail_pelanggan').html(data);
                }
            });*/
        });

        $("#bayar").keyup(function(){
            var byr = $("#bayar").val();
            var number = numeral(byr);
            var bayar = number.format('0,0');
            var biasa = $("#biasa").val();
            var tot = $("#disk").val();
            if(byr < 0){
                alert('Anda Salah memasukkan jumlah pembayaran!');
                $("#bayar").val(0);
            }
            else {
                if(tot == 0){
                    var kembali = parseInt(byr)-parseInt(biasa);
                    var number = numeral(kembali);
                    var numbering = number.format('0,0');
                    var kbl = 'Rp. '+numbering;
                $("#kembali").val(kbl);
                }else {
                var kembali = parseInt(byr)-parseInt(tot);
                var number = numeral(kembali);
                var numbering = number.format('0,0');
                var kbl = 'Rp. '+numbering;
                $("#kembali").val(kbl);
                }
        }
        });

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan dihapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>transaksi/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });


    })
</script>