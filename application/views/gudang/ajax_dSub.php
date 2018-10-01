<?php
if(isset($det_sub)){
    foreach($det_sub as $row){ 
    	?>
            	<option value="<?php echo $row->ID_SUB?>"><?php echo $row->JENIS_PRODUK?></option>

<?php } } ?>