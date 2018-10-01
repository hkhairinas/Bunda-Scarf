<?php
    if(isset($detail_pelanggan)){
        foreach($detail_pelanggan as $row){
            ?>

            <label class="col-md-1">Alamat</label>
                <div class="col-md-2">
                    <input name="alamat" type="text" value="<?php echo $row->ALAMAT; ?>" readonly="readonly" class="form-control">
                </div>

            <label class="col-md-1">Email</label>
                <div class="col-md-3">
                    <input name="email" type="text" value="<?php echo $row->EMAIL; ?>" readonly="readonly" class="form-control">
                </div>

        <?php
        }
    }
?>
