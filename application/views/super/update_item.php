<section id="main-content">
    <section class="wrapper">
<div class="row">

</div>
<script language='javascript'>
function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}
</script>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                       Form Update item
                    </header>
                    <div class="panel-body">
<?php echo form_open_multipart('super/simpan_update_item', 'class=form-horizontal');?>
                        <?php echo form_hidden('kd_produk', $this->uri->segment(3));?>
<div class="form-group">
                                <label class="col-sm-2 control-label">Kode Barang</label>
                                <div class="col-sm-3">
<?php echo form_input('kodebarang', $produk['kd_produk'], array('class' => 'form-control round-input', 'readonly' => 'TRUE'));?>
</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">UPC</label>
                                <div class="col-sm-3">
<?php echo form_input('upc', $produk['upc'], array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-3">
<?php echo form_input('namaproduk', $produk['nama_produk'], array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Vendor</label>
                                <div class="col-sm-3">
                                  <select class="form-control" name="vendor">
                                    <option>
<?php echo $produk['vendor'];?>
</option>


<?php foreach ($vendor as $row) {

	?>
	<option>
	<?php echo $row->nama_vendor;?>
	</option>
	<?php }?>
</select>
                                  </div>                                </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Departement</label>
                                <div class="col-sm-3">


                                  <select class="form-control" name="dept">
<?php echo $produk['dept'];?>

<?php foreach ($dept as $row) {

	?>
	<option>
	<?php echo $row->nama_dept;?>
	</option>
	<?php }?>
</select>
</div>

<div class="form-group">
                                <label class="col-sm-2 control-label">Type</label>
                                <div class="col-sm-3">


                                  <select class="form-control" name="type">
<?php echo $produk['type'];?>

<?php foreach ($pack as $row) {

	?>
	<option>
	<?php echo $row->nama_type;?>
	</option>
	<?php }?>
</select>

</div>
 </div>
<div class="form-group">
<label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-1">
<i class="fa fa-cloud-upload"><input type="file" name="gambar" required="required"/> <img src="<?php echo base_url();?>gambar/<?php echo $produk['gambar'];?>" alt="" class="img-circle" width='120px'></i>

   </div>
</div>
                      <div class="form-group">
                                <label class="col-sm-2 control-label">QTY Inner</label>
                                <div class="col-sm-1">
<?php echo form_input('qtyiner', $produk['qty_iner'], array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)'));?>
</div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QTY Carton</label>
                                <div class="col-sm-1">
<?php echo form_input('qtycarton', $produk['qty_carton'], array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)'));?>
</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QTY Palet</label>
                                <div class="col-sm-1">
<?php echo form_input('qtypalet', $produk['qty_palet'], array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)'));?>
</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CBM</label>
                                <div class="col-sm-1">
<?php echo form_input('cbm', $produk['cbm'], array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)'));?>
</div>

                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
<?php echo form_submit('simpan', 'Save', array('class' => 'btn btn-primary'));?>
</div>
                            </div>
                            </div>
<?php echo form_close();?>
</div>
                </section>
