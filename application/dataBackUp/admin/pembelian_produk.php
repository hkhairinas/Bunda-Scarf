<!-- CONTENT -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pembelian Produk</h1>
    </div>
    </div>
<div class="panel panel-default">
<div class="panel-body">    
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-md-2">Kode Pembelian</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" value=" <?php echo $ID_PEMBELIAN; ?>" readonly>
                </div>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>pembelian</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>
                        <a href="#modalBeliBarang" class="btn btn-default btn-block" data-toggle="modal">
                        <i class="fa fa-plus"></i> Pembelian Produk</a>
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
                    <td class="hidden"><?php echo $items['supp'];?></td>
                    <td class="hidden"><?php echo $items['hrg'];?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                    <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td>
                        <a class="btn btn-mini btn-danger btn-block delbutton" href="#" class="delbutton"
                           id="<?php echo 'tambah/'.$items['rowid'].'/'.$ID_PEMBELIAN.'/'.$items['id'].'/'.$items['qty']; ?>">
                             Hapus <i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php $i++; $no++;?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    <input type="hidden" name="id_supp">
    <form class="form-horizontal" action="<?php echo site_url('pembelian/simpan_pembelian') ?>" method="post">

               <!-- <div class="form-group">
                    <label class="col-md-2"> <strong>Daftar Supplier</strong></label>
                        <div class="col-md-3">
                                <select id="id_supplier" tabindex="5" class="btn btn-default" name="id_supplier" data-placeholder="Pilih Pelanggan">
                                    <option value="">--- Pilih Supplier ---</option>
                                    <?php
                                    if(isset($data_supplier)){
                                        foreach($data_supplier as $row){
                                            ?>
                                            <option value="<?php echo $row->ID_SUPP?>"><?php echo $row->NAMA_SUPP?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                        </div>
                
                <div id="detail_supplier"></div>     
                </div> -->
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="form-group">
                        <label class="col-md-2"><strong>Total Pembelian</strong></label>
                        <div class="col-md-2">
                            <input type="text" class="uneditable-input input-block-level form-control"
                                   value="Rp. <?php echo number_format($this->cart->total()); ?> " id="tot" readonly>
                            <input type="hidden" name="total" id="total" value="<?php echo $this->cart->total();?>">       
                            <input type="hidden" name="ID_PEMBELIAN" value="<?= $ID_PEMBELIAN; ?>" readonly>
                            <input type="hidden" name="nm_barang" value="<?= $ID_PEMBELIAN; ?>" readonly>
                            <input type="hidden" name="total_harga" value="<?= $this->cart->total()?>">
                            <input id="tanggal_pembelian" type="hidden" name="tanggal_pembelian" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>" data-date="12-02-2012">
                        </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan Pembelian </button>
                    <a href="<?php echo site_url('pembelian')?>" class="btn btn-danger"> Batal <i class="fa fa-remove"></i></a>
                </div>
    </form>
</div>
</div>
</div>
</div>

 <!-- MODAL ADD pembelian BARANG  -->
 <div class="modal fade" id="modalBeliBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pembelian</h4>
    </div>
    <div class="modal-body">
        <form id="frm" name="frm" class="form-horizontal" method="post" action="<?php echo site_url('pembelian/tambah_pembelian_to_cart')?>">
        <div class="form-group">
                <label class="col-md-4">Daftar Produk</label>
                <div class="col-md-5">
                    <select id="ID_PROD" class="form-control" name="ID_PROD">
                        <option value=""> --- Pilih Produk --- </option>
                        <?php
                        if(isset($data_produk)){
                            foreach($data_produk as $row){
                                ?>
                                <option value="<?php echo $row->ID_PROD?>"><?php echo $row->NAMA_PROD?></option>
                            <?php
                            }
                        }
                        ?>
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
        $("#ID_PROD").change(function(){
            var ID_PROD = $("#ID_PROD").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('pembelian/get_dProduk'); ?>",
                data: "ID_PROD="+ID_PROD,
                cache:false,
                success: function(data){
                    $('#detail_produk').html(data);
                    document.frm.add.disabled=false;
                }
            });
        });

        /*$("#id_supplier").change(function(){
            var id_supplier = $("#id_supplier").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('pembelian/get_dSupplier'); ?>",
                data: "id_supplier="+id_supplier,
                cache:false,
                success: function(data){
                    $('#detail_supplier').html(data);
                }
            });
        });*/

        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan dihapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>pembelian/hapus_pembelian",
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