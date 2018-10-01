   	<option value=""> --- Pilih Produk --- </option>
<?php
if(isset($det_prod)){
    foreach($det_prod as $row){ 
    	?>
        <option value="<?php echo $row->ID_PROD?>"><?php echo $row->NAMA_PROD?></option>

<?php } } ?>