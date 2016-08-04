
<section id="main-content">
    <section class="wrapper">
<div class="row">
  <div class="col-lg-12">
<div class="btn-group">
<a class="btn btn-primary" href="<?php echo site_url('super/item_input');?>"><i class="fa fa-database"></i>Add</a>
  </div>


   <span class="lite">Total Item<?php echo $jumlah= $this->db->count_all('m_produk'); ?></span>
  </div>




  <ul class="nav top-menu">
      <li>
      
        <div class="form-group">
        <?php echo form_open('super/item_list', 'class=form-search');  ?>
        <?php echo form_input('pencarian','',array('class'=>'form-control round-input','onkeyup'=>'this.value = this.value.toUpperCase()')); ?>
<?php echo form_submit('','Search',array('class'=>'btn btn-primary')); ?>
        <?php echo form_close(); ?>
      </div>
      </li>
  </ul>



            <table class="table table-striped table-advance table-hover">
             <tbody>
               <div class="pagination pagination-right">
                 <?php
                   echo $this->pagination->create_links();
                   ?>
                 </div>
                <tr>
                  <th><i class=""></i> NO</th>
                   <th><i class="fa fa-code"></i> Kode Produk</th>
                   <th><i class="fa fa-barcode"></i> UPC</th>
                   <th><i class="fa fa-linux"></i> Nama Produk</th>
                   <th><i class="fa fa-rebel"></i> Vendor</th>
                   <th><i class="fa fa-group"></i> Dept</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Inner</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Karton</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> Qty Pallet</th>
                   <th><i class="fa fa-sort-numeric-asc"></i> CBM</th>
                   <th><i class=" fa fa-wrench"></i> Action</th>
                </tr>
<tr class="active">
                  <?php
                  $no = $offset;
                  foreach ($data as $d) {

                  ?>
                  <td class=""><?php echo ++$no;?></td>
                   <td class=""><?php echo $d->kd_produk;?></td>
                   <td><?php echo $d->upc;?></td>

                   <td><?php echo $d->nama_produk;?></td>
                   <td><?php echo $d->vendor;?></td>
                   <td><?php echo $d->dept;?></td>
                   <td><?php echo $d->qty_iner;?></td>
                   <td><?php echo $d->qty_carton;?></td>

                   <td><?php echo $d->qty_palet;?></td>
                   <td><?php echo $d->cbm;?></td>
                   <td>
                    <div class="btn-group">

                        <?php echo anchor('super/item_edit/'.$d->kd_produk,'<i class=icon_check_alt ></i>Edit')?>

                    </div>
                    </td>
                </tr>
              <?php }
            ?>

              </tbody>

</table>
