<div class="container">

  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Tampilkan Form</button>
  <div id="demo" class="collapse">
    <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">

                    </header>
                    <div class="panel-body">
<?php echo form_open_multipart('super/simpan_po/', 'class=form-horizontal');?>
<div class="form-group">

 <div class="col-sm-2">
 <label>No PO</label>
<?php echo form_input('nopo', $kode, array('class' => 'form-control round-input', 'readonly' => true, 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
<label>Vendor</label>
<select class="form-control" name="vendor">

                                  <option>--Pilih--</option>

<?php foreach ($vendor as $row) {

	?>
	<option>
	<?php echo $row->nama_vendor;?>
	</option>
	<?php }?>
</select>

</div>

<div class="form-group">
<div class="col-sm-2">
                                <label>Kode Produk</label>
<?php echo form_input('kode', '', array('class' => 'form-control round-input', 'id' => 'kode', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?></div>
<div class="form-group">
<input id="autocomplete" title="type &quot;a&quot;">
<div class="col-sm-2">
<label>Nama Produk</label>
<?php echo form_input('namaproduk', '', array('class' => 'form-control round-input', 'id' => 'namaproduk', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
</div>

<div class="form-group">
<div class="col-sm-1">
<label>QTY</label>

<?php echo form_input('qtyiner', '', array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)', 'required' => 'required'));?>
</div>

<div class="form-group">
<div class="col-sm-2">
<label>User</label>
<?php echo form_input('user', $nama.'||'.$nip, array('class' => 'form-control round-input', 'readonly' => true, 'onkeyup' => 'this.value = this.value.toUpperCase()'));
?>
</div>
</div>


<div class="form-group">
                                <div class="col-lg-offset-1 col-lg-9">
<?php echo form_submit('simpan', 'Save', array('class' => 'btn btn-primary'));?>

<?php echo form_reset('reset', 'Reset', array('class'         => 'btn btn-danger'));?>
<?php echo form_submit('simpanpo', 'Simpan PO', array('class' => 'btn btn-warning'));
?>
</section>
</div>
                            </div>





  </div>
</div>


<?php echo form_close();?>
<div class="col-xs-11">
          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #99ffff;">Nomor PO</th>
                  <th style="background-color: #99ffff;">Vendor</th>
                  <th style="background-color: #99ffff;">Kode Produk</th>
                  <th style="background-color: #99ffff;">Nama Produk</th>
                  <th style="background-color: #99ffff;">Qty</th>
                  <th style="background-color: #99ffff;">Lokasi</th>
                  <th style="background-color: #99ffff;">User</th>
                  <th style="background-color: #99ffff;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr class="success">
                  <td class="bg-info">Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
</tbody>
</table>
</div>
</div>
