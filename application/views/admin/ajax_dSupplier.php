<?php
    if(isset($detail_supplier)){
        foreach($detail_supplier as $row){
            ?>

            <label class="col-md-1">No Telp</label>
                <div class="col-md-2">
                    <input name="email" type="text" value="<?php echo $row->NO_TELP_SUPP; ?>" readonly="readonly" class="form-control">
                </div>

        <?php
        }
    }
?>
