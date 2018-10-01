<?php
if(isset($detail_produk2)){
    foreach($detail_produk2 as $row){
        ?>
        <div class="form-group">
            <label class="col-md-4">ID Produk</label>
            <div class="col-md-5">
                <input name="id_prod" class="form-control" type="text" value="<?php echo $row->ID_PROD; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Nama Produk</label>
            <div class="col-md-5">
                <input name="nama_prod" class="form-control" type="text" value="<?php echo $row->NAMA_PROD; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Harga</label>
            <div class="col-md-5 ">
                <input name="harga" class="form-control" type="text" value="<?php echo $row->HARGA_JUAL; ?>" readonly="readonly">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">Stok Tersedia (1,2,3,4,5) </label>
            <div class="col-md-2">
                <input name="s1" id="s" class="form-control" type="number" value="<?php echo $row->s1; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="m2" id="m" class="form-control" type="number" value="<?php echo $row->m2; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="l3" id="l" class="form-control" type="number" value="<?php echo $row->l3; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="xl4" id="xl" class="form-control" type="number" value="<?php echo $row->xl4; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="as5" id="as" class="form-control" type="number" value="<?php echo $row->as5; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2">Masukkan Jumlah (1,2,3,4,5) </label>
            <div class="col-md-2">
                <input name="is1" id="is" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="im2" id="im" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="il3" id="il" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="ixl4" id="ixl" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="ias5" id="ias" class="form-control" type="number" value="0">
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-4">Jumlah Penjualan</label>
            <div class="col-md-6">
                <input name="qty" id="qty" class="form-control" type="text" class="" placeholder="Input Jumlah Produk yang Dijual" readonly="">
            </div>
        </div>

    <?php
    }
}
?>

<script type="text/javascript">
     $(document).ready(function() {   
            $("#is").change(function(){
        var s = $("#s").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        if(is>s){
            alert('Stok yang anda masukkan Kurang dari Stok yang tersedia!');
                $("#is").val(0);
                $("#qty").val(0);
            }
            else if(is<0){
                alert('Stok yang anda masukkan salah!');
                $("#is").val(0);
                $("#qty").val(0);
            }
            else{
                    $("#qty").val(jml);}
        });
        $("#im").change(function(){
        var m = $("#m").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        /*if(im>m){
            alert('Stok yang anda masukkan Kurang dari Stok yang tersedia!');
                $("#im").val(0);
        }*/
            if(im>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#im").val(0);}
            
        });
        $("#il").change(function(){
        var l = $("#l").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        /*if(il>l){
            alert('Stok yang anda masukkan Kurang dari Stok yang tersedia!');
                $("#il").val(0);
        }
        else {}*/
            if(il>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#il").val(0);}
            
        });
        $("#ixl").change(function(){
        var xl = $("#xl").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        /*if(ixl>xl){
            alert('Stok yang anda masukkan Kurang dari Stok yang tersedia!');
                $("#ixl").val(0);
        }
        else {}*/
            if(ixl>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#ixl").val(0);}
            
        });
        $("#ias").change(function(){
        var xl = $("#xl").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        if(ias<0){
            alert('Stok yang anda masukkan salah!');
            $("#ias").val(0);}
        else{
            $("#qty").val(jml);}
        });
        
})
</script>