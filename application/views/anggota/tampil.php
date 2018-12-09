<!DOCTYPE html>


<html>

	<head>

		<title>Data Anggota Koperasi</title>


		<style>
		
			table{
				width: 1000px;
				border: 1px solid black;
				margin: auto;
				text-align: center;
			
			}

			table, tr, td, td, th {
				text-align: center;
				padding: 10px;
				border-collapse: collapse;
				font-size:16px;
				font-family: century gothic;

			}

			#textInserted{
				color: #4ec900;
			}

		</style>

		<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>



	</head>






	<body>

		<center>
			<h1>Data Anggota</h1>
			<br><br><br><br>
		</center>



		<div class="container">
		<h3>Form data<h3>
		<br><br>

	<form action="<?php echo base_url()?>Anggota/form_validation" method="post">
		
		<?php 

			if($this->uri->segment(2) == "inserted")
			{
				echo '<p class="text-success" id="textInserted">Data Inserted</p>';
			}

			else if($this->uri->segment(2) == "updated")
			{
				echo '<p class="text-success" id="textInserted">Data Updated</p>';
			}

		 ?>




<!-- MEREFRESH TAMPILAN SESUDAH DI UPDATE -->
		    <?php 

		 	if(isset($user_data))
		 	{
		 		foreach ($user_data->result() as $row) 
		 		{
		 	?>

					<div class="form-group">
						<h3>Nama Lengkap</h3>
						<input type="text" name="nama" value="<?php echo $row->nama_lengkap;?>"/>
						<span class="text-danger"><?php echo form_error("nama"); ?></span>
					</div>

							<br>

					<div class="form-group">
						<h3>Jurusan</h3>
						<input type="text" name="jurusan" value="<?php echo $row->jurusan;?>"/>
					<span class="text-danger"><?php echo form_error("jurusan"); ?></span>
					</div>
		
					<br>

					<div class="form-group">
						<h3>Simpanan</h3>
						<input type="numeric" name="simpanan" value="<?php echo (int)$row->simpanan;?>"/>
						<span class="text-danger" ><?php echo form_error("simpanan"); ?></span>
					</div>

					<br>
					

					<div class="form-group">
						<h3>Email</h3>
						<input type="text" name="email" value="<?php echo $row->email;?>"/>
						<span class="text-danger" ><?php echo form_error("email"); ?></span>

					</div>


					<div class="form-group">
						<br><br>
						<input type="hidden" name="hidden_id" value="<?php echo $row->id_anggota;?>"/>
						<input type="submit" value="Update" name="update"/>
					</div>


					<?php		
				}
			}		
			else
			{
			?>
			<!-- TAMPILAN SAAT LAMAN BARU DIBUKA -->
			<div class="form-group">
				<h3>Nama Lengkap</h3>
				<input type="text" name="nama"/>
				<span class="text-danger"><?php echo form_error("nama"); ?></span>
			</div>


			<br>


			<div class="form-group">
				<h3>Jurusan</h3>
				<input type="text" name="jurusan"/>
				<span class="text-danger"><?php echo form_error("jurusan"); ?></span>
				
			</div>
			

			<br>


			<div class="form-group">
				<h3>Simpanan</h3>
				<input type="text" name="simpanan"/>
				<span class="text-danger" ><?php echo form_error("simpanan"); ?></span>
				
			</div>
			

			<br>


			<div class="form-group">
				<h3>Email Anggota</h3>
				<input type="text" name="email"/>
				<span class="text-danger" ><?php echo form_error("email"); ?></span>
				
			</div>


			<br>


			<div class="form-group">
				<br><br>
				<input type="submit" value="Insert" name="insert"/>
			</div>	

			<?php
			}
			?>

	</form>	

</div>				

















<br><br><br>








<!-- DATABASE DATA -->
	<table border="1">

		<tr >
			
			<th>ID Anggota</th>
			<th>Nama Lengkap</th>
			<th>Jurusan</th>			
			<th>Email</th>
			<th>Delete</th>
			<th>Update</th>
			
		</tr>
	<?php 
		if($fetch_data->num_rows()>0)
		{
			foreach ($fetch_data->result() as $row) {
				# code...
		?>
			<tr>
				<td><?php echo $row->id_anggota; ?></td>
				<td><?php echo $row->nama_lengkap; ?></td>
				<td><?php echo $row->jurusan; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><a href="#" class="delete_data" id="<?php echo $row->id_anggota; ?>">Delete</a></td>
				<td><a href="<?php echo base_url(); ?>Anggota/update_data/
				<?php echo $row->id_anggota; ?>">Edit</a></td>
			</tr>
		<?php
			}
		}
		else
		{
		?>

			<tr>
				
				<td colspan="6">No Data Found</td>

			</tr>

		<?php 
		}
	 ?>
	 </table>


	 <script>
	 	
	 	$(document).ready(function(){
 			$('.delete_data').click(function(){
 				var id = $(this).attr("id"); 

 				if(confirm("Are you sure ?"))
 				{
 					window.location= "<?php echo base_url();?>Anggota/delete_data/"+id;

 				}
 				else
 				{
 					return false;
 				}

 		});
	 });

	 </script>
		
	</body>



</html>