<script>
        $(document).ready(function(){
            $("#vendor").change(function (){
                var url = "<?php echo site_url('super/add_ajax_kab');?>/"+$(this).val();
                $('#kdproduk').load(url);
                return false;
            })

      $("#kdproduk").change(function (){
                var url = "<?php echo site_url('super/add_ajax_kec');?>/"+$(this).val();
                $('#namaproduk').load(url);
                return false;
            })

      $("#namaproduk").change(function (){
                var url = "<?php echo site_url('super/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>
<section class="wrapper">
<div class="row">
  <div class="col-lg-12">

  </div>
</div>


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
<select class="form-control" name="ven" id="vendor">

  <option>--Pilih--</option>

<?php foreach ($produk as $prov) {
	echo '<option value="'.$prov->kd_vendor.'">'.$prov->nama_vendor.'</option>';
}?>
</select>

</div>

<div class="form-group">
<div class="col-sm-2">
   <label>Kode Produk</label>
<select class="form-control" name="kd" id="kdproduk">

                                  <option>--Pilih--</option>


                                  </select>
                                  </div>
<div class="form-group">
<div class="col-sm-4">
<label>Nama Produk</label>
<select class="form-control" name="namapro" id="namaproduk" readonly="readonly">
    <option>--Pilih--</option>

  </select>


</div>

<div class="form-group">
<div class="col-sm-1">
<label>QTY</label>

<?php echo form_input('qty', '', array('class' => 'form-control round-input', 'onkeyup' => 'validAngka(this)', 'required' => 'required'));?>
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
