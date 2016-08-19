<section id="main-content">
    <section class="wrapper">
<div class="row">
  <div class="col-lg-12">

  </div>
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
                                <label class="col-sm-1 control-label">No PO</label>
                                <div class="col-sm-2">
<?php echo form_input('vendor', $kode, array('class' => 'form-control round-input', 'readonly' => true, 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
</div>
                          <div class="form-group">

                                <div class="col-sm-2">
<?php echo form_input('dpt', '', array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
<?php echo form_input('dpt', '', array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
<?php echo form_input('dpt', '', array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
<?php echo form_input('dpt', '', array('class' => 'form-control round-input', 'onkeyup' => 'this.value = this.value.toUpperCase()'));?>
</div>
</div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
<?php echo form_submit('simpan', 'Save', array('class'                                    => 'btn btn-primary'));?>
                                    <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-danger'));?>
</div>
                            </div>
                            </div>
                            </div>

  </div>
</div>
</section>


<?php echo form_close();?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th style="background-color: #99ffff;">Nomor PO</th>
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
