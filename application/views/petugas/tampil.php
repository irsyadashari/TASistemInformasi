<html>
<head>


	<title>Data Petugas</title>


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
		<h1>Data Petugas</h1>
		<br><br><br><br>
	</center>









<div class="container">
		<h3>Form data<h3>
		<br><br>

	<form action="<?php echo base_url()?>Petugas/form_validation" method="post">
		
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
						<h3>Nama</h3>
						<input type="text" name="nama" value="<?php echo $row->nama_lengkap;?>" />
						<span class="text-danger"><?php echo form_error("nama"); ?></span>
					</div>

							<br>

					<div class="form-group">
						<h3>Username</h3>
						<input type="text" name="username" value="<?php echo $row->username;?>"/>
					<span class="text-danger"><?php echo form_error("username"); ?></span>
					</div>
		
					<br>

					<div class="form-group">
						<h3>Password</h3>
						<input type="password" name="password" value="<?php echo $row->password;?>"/>
						<span class="text-danger" ><?php echo form_error("password"); ?></span>
					</div>

					<br>
					<div class="form-group">
						<h3>Pekerjaan/Jabatan</h3>
						<input type="text" name="pekerjaan" value="<?php echo $row->pekerjaan;?>"/>
						<span class="text-danger" ><?php echo form_error("pekerjaan"); ?></span>
					</div>

					<br>

					<div class="form-group">
						<h3>Email</h3>
						<input type="text" name="email" value="<?php echo $row->email; ?>"/>
						<span class="text-danger" ><?php echo form_error("email"); ?></span>

					</div>


					<div class="form-group">
						<br><br>
						<input type="hidden" name="hidden_id" value="<?php echo $row->id_username; ?>"/>
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
				<h3>Nama</h3>
				<input type="text" name="nama"/>
				<span class="text-danger"><?php echo form_error("nama"); ?></span>
			</div>


			<br>


			<div class="form-group">
				<h3>Username</h3>
				<input type="text" name="username"/>
				<span class="text-danger"><?php echo form_error("username"); ?></span>
				
			</div>
			

			<br>


			<div class="form-group">
				<h3>Password</h3>
				<input type="password" name="password"/>
				<span class="text-danger" ><?php echo form_error("password"); ?></span>
				
			</div>
			

			<br>


			<div class="form-group">
				<h3>Pekerjaan/Jabatan</h3>
				<input type="text" name="pekerjaan"/>
				<span class="text-danger" ><?php echo form_error("pekerjaan"); ?></span>
				
			</div>



			<br>
			<div class="form-group">
				<h3>Email</h3>
				<input type="text" name="email"/>
				<span class="text-danger" ><?php echo form_error("email"); ?></span>
				
			</div>



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
			
			<th>ID</th>
			<th>Nama Lengkap</th>
			<th>Username</th>
			<th>Password</th>
			<th>Pekerjaan/Jabatan</th>
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
				<td><?php echo $row->id_username; ?></td>
				<td><?php echo $row->nama_lengkap; ?></td>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->password; ?></td>
				<td><?php echo $row->pekerjaan; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><a href="#" class="delete_data" id="<?php echo $row->id_username; ?>">Delete</a></td>
				<td><a href="<?php echo base_url(); ?>Petugas/update_data/
				<?php echo $row->id_username; ?>">Edit</a></td>
			</tr>
		<?php
			}
		}
		else
		{
		?>

			<tr>
				
				<td colspan="7">No Data Found</td>

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
 					window.location= "<?php echo base_url();?>Petugas/delete_data/"+id;

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