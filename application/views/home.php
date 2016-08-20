<html lang="en">
<head>
<script type='text/javascript' src='<?php echo base_url();?>assets/js1/jquery-1.8.2.min.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>assets/js1/jquery.autocomplete.js'></script>

    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js1/jquery.autocomplete.css' rel='stylesheet' />

<script type='text/javascript'>
        var site = "<?php echo site_url();?>";
        $(function(){
            $('.autocomplete').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/super/create_po',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#kdproduk').val(''+suggestion.kdproduk); // membuat id 'v_nim' untuk ditampilkan
                    $('#namaproduk').val(''+suggestion.namaproduk); // membuat id 'v_jurusan' untuk ditampilkan
                }
            });
        });
    </script>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="<?php echo base_url();?>img/logo-big.png">
	<title><?php echo $title;?></title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" />
	<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
</head>
	<body style="background:#1abc9c">
		<form action="<?php echo site_url('login/masuk');?>" method="post">
			<div class="col-md-4 col-md-offset-4" style="margin-top:10%">
				<h3 align="center"><?php echo $judul;?></h3>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row form-group">
							<label class="col-md-3" for="username">NIP
							</label>
							<div class="col-md-9">
								<input type="text" name="nip" class="form-control input-sm" id="nip" required>
							</div>
						</div>


						<div class="row form-group">
							<label class="col-md-3" for="password">
							Password
							</label>
							<div class="col-md-9">
								<input type="password" name="pass" class="form-control input-sm" id="pass" required>
							</div>
						</div>

						<div class="row form-group">
							<label class="col-md-3"></label>
							<div class="col-md-9">
								<button type="submit" class="btn btn-info btn-sm">Login</button>
							</div>
						</div>
					</div>
				</div>

<?php
if ($this->session->flashdata('pesan') <> '') {
	?>
	<div class="alert alert-dismissible alert-danger">
	<?php echo $this->session->flashdata('pesan');?>
	</div>
	<?php
}
?>
</div>
		</form>
	</body>
</html>
