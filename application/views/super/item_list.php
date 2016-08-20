
<div class="row">
  <div class="col-lg-12">

    <div class="btn-group">
    <a class="btn btn-primary" href="<?php echo site_url('super/item_input');?>"><i class="fa fa-database"></i>Add</a>
      </div>

   <span class="lite">Total Item<?php echo $jumlah = $this->db->count_all('m_produk');?></span>
  </div>
<?php
echo $halaman;
?>
<?php echo form_open('');?>
<div class="col-md-5">
                  <div class="input-group input-group-sm">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>


<?php echo form_input('pencarian', '', array('class' => 'form-control round-input'));?>
<span class="input-group-btn">
<?php echo form_submit('sumbit', 'Search', array('class' => 'btn btn-primary'));?>
</span>
                  </div>
        </div>
<?php form_close();?>
<table class="table table-striped table-advance table-hover">
             <tbody>
                <tr>
                  <th><i class=""></i> NO</th>
                   <th><i class="fa fa-code"></i> Kode Produk</th>
                   <th><i class="fa fa-barcode"></i> UPC</th>
                   <th><i class="fa fa-linux"></i> Nama Produk</th>
                   <th><i class="fa fa-rebel"></i> Vendor</th>
                   <th><i class="fa fa-group"></i> Dept</th>
                    <th><i class="fa fa-check-square-o"></i> Type</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Inner</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Karton</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Pallet</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> CBM</th>
                   <th><i class=" fa fa-wrench"></i> Action</th>
                </tr>
<tr class="active">
<?php
$no = 0;

foreach ($data as $d) {

	?>
										 <td class=""><?php echo ++$no;?></td>
									<td class=""><?php echo $d->kd_produk;?></td>
										 <td><?php echo $d->upc;?></td>
									<td><?php echo $d->nama_produk;?></td>
									 <td><?php echo $d->kd_vendor;?></td>
									<td><?php echo $d->dept;?></td>
							    <td><?php echo $d->type;?></td>

									 <td><?php echo $d->qty_iner;?></td>

																									   <td><?php echo $d->qty_carton;?></td>

																										  <td><?php echo $d->qty_palet;?></td>
																											   <td><?php echo $d->cbm;?></td>
																										  <td>
																																									 <div class="btn-group">
	<?php ?>
																																						<i class='btn btn-info'><?php echo anchor('super/item_edit/'.$d->kd_produk, '<b/>Edit');?><i class="fa fa-edit"></i></i>



																																											     </div>
																																									</td>
																																									 </tr>
	<?php }
?>
</tbody>

</table>
