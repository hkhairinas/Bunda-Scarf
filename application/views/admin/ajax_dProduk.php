<?php
if(isset($detail_produk)){
    foreach($detail_produk as $row){
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
            <label class="col-md-4">Supplier</label>
            <div class="col-md-5 ">
                <input name="supp" class="form-control" type="hidden" value="<?php echo $row->ID_SUPP; ?>" readonly="readonly">
                <input name="nama_supp" class="form-control" type="text" value="<?php echo $row->NAMA_SUPP; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group ">
            <label class="col-md-4">Modal</label>
            <div class="col-md-5 ">
                <input name="harga" id="hrgb" class="form-control" type="text" value="<?php echo $row->HARGA_BELI; ?>">
                <input name="hrgj" id="hrgj" class="form-control" type="hidden" value="<?php echo $row->HARGA_JUAL; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Stok Tersedia (S,M,L,XL,ALL SIZE) </label>
            <div class="col-md-2">
                <input name="s" id="s" class="form-control" type="number" value="<?php echo $row->S; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="m" id="m" class="form-control" type="number" value="<?php echo $row->M; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="l" id="l" class="form-control" type="number" value="<?php echo $row->L; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="xl" id="xl" class="form-control" type="number" value="<?php echo $row->XL; ?>" readonly="readonly">
            </div>
            <div class="col-md-2">
                <input name="as" id="as" class="form-control" type="number" value="<?php echo $row->ALL_SIZE; ?>" readonly="readonly">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4">Masukkan Jumlah Pembelian (S,M,L,XL,ALL SIZE) </label>
            <div class="col-md-2">
                <input name="is" id="is" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="im" id="im" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="il" id="il" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="ixl" id="ixl" class="form-control" type="number" value="0">
            </div>
            <div class="col-md-2">
                <input name="ias" id="ias" class="form-control" type="number" value="0">
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4">Jumlah Pembelian</label>
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
        $("#hrgb").keyup(function(){
        var hrgbeli = $("#hrgb").val();
        var hargajual = parseInt(hrgbeli)+parseInt(hrgbeli*(20/100));
        $("#hrgj").val(hargajual);
    });

            $("#is").change(function(){
        var s = $("#s").val();
        var is = $("#is").val(); 
        var im = $("#im").val(); 
        var il = $("#il").val(); 
        var ixl = $("#ixl").val();
        var ias = $("#ias").val();
        var qty = $("#qty").val();
        var jml = parseInt(is)+parseInt(im)+parseInt(il)+parseInt(ixl)+parseInt(ias);
        /*if(is>s){
            alert('Stok yang anda masukkan Kurang dari Stok yang tersedia!');
                $("#is").val(0);
        }
        else {}*/
            if(is>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#is").val(0);}
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
        }
        else {}*/
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
            if(ixl>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#ixl").val(0);
                $("#qty").val(0);}
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
            if(ias>=0){
                $("#qty").val(jml);}
            else{
                alert('Stok yang anda masukkan salah!');
                $("#ias").val(0);
                $("#qty").val(0);}
        });
        
})
</script>