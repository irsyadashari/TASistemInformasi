<!DOCTYPE html>


<html>

	<head>

		<title>Data Simpanan Anggota Koperasi</title>


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
				font-size:25px;
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
			<h1>Data Simpanan Anggota Koperasi</h1>
			<br><br><br><br>
		</center>



		
		
		<br><br><br>
<!-- DATABASE DATA -->
	<table border="1">

		<tr >
			
			<th>ID Anggota</th>
			<th>Nama Lengkap</th>
			<th>Simpanan</th>
						
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
				<td>Rp.<?php echo number_format($row->simpanan); ?></td>				
			</tr>
		<?php
			}
		}
		else
		{
		?>
			<tr>
				
				<td colspan="3">No Data Found</td>

			</tr>

		<?php 
		}
	 ?>
	 </table>			
	</body>



</html>