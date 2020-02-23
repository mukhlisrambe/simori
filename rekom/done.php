<?php include_once('../_header.php'); ?>

	<div class="box">
		<h1>Rekomendasi</h1>
		<h4>
			<small>Data Rekomendasi</small>
			
		</h4>	
		<form method="post" name="proses">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="rekom">
				<thead>
					<tr>
						
						<th>No.</th>
						
						<th>Rekomendasi</th>
						<th>Unit Pendukung</th>
						<th>Deadline</th>
						<th>Tanggapan</th>
						<th>Bukti Tindak Lanjut</th>
						<th>Status Tindak Lanjut</th>
						<th>Komentar KI</th>
						<th><i class="glyphicon glyphicon-cog"></i></th>
					</tr>
				</thead>
				<tbody>	
				<?php 
				$no= 1;
				$user= $_SESSION['user'];
				$query = "SELECT * FROM tb_rekom 
									INNER JOIN tb_user ON tb_rekom.id_user= tb_user.id_user WHERE tb_user.username= '$user' AND status= 'Selesai ditindaklanjuti' ";

				$sql_rekom = mysqli_query($con,$query) or die (mysqli_error($con));
				 if(mysqli_num_rows($sql_rekom) > 0){ 
					while($data = mysqli_fetch_array($sql_rekom)) { ?>
					<tr>
						
						<td><?=$no++?>.</td>
						
						<td><?=$data['rekomendasi']?></td>
						<td>
							<?php
									$sql_unit= mysqli_query($con, "SELECT * FROM tb_rekom_unit_pen JOIN tb_unit_pen ON tb_rekom_unit_pen.id_unit_pen= tb_unit_pen.id_unit_pen WHERE id_rekom='$data[id_rekom]' ") or die(mysqli_error($con)); 
									while ($data_unit= mysqli_fetch_array($sql_unit)){
										echo $data_unit['nama_unit']. "<br>";
									}

									 ?>
						</td>
						<td><?=tgl_indo($data['deadline'])?></td>
						<td><?=$data['tanggapan']?></td>
						<td>
							<a href="simpan.php?file=<?=$data['file']?>"><?=$data['file']?></a>
						</td>
						<td><?=$data['status']?></td>
						<td><?=$data['komentar_ki']?></td>
						<td align="center">
							<a href="edit.php?id=<?=$data['id_rekom']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
						</td>
					</tr>

				<?php
				}
				}else {
					echo "<tr><td colspan=\"9\" align=\"center\">Data tidak ditemukan</td></tr>";
				}
				?>
				</tbody>
			</table>
		</div>
		</form>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#rekom').DataTable({
				columnDefs: [
					{
						"searchable":false,
						"orderable": false,
						"targets": [-1,8]
					}
				],
				"order": [0,"asc"]
			});
			$('#select_all').on('click', function () {
				if(this.checked){
					$('.check').each(function(){
						this.checked = true;
					})
				}else {
				$('.check').each(function(){
						this.checked = false;
			})
			}
		})

			$('.check').on('click', function (){
				if($('.check:checked').length == $('.check').length) {
					$('#select_all').prop('checked', true);
				}else {
					$('#select_all').prop('checked', false);
				}
			})
		})
	function hapus (){
		var conf= confirm('Yakin akan menghapus data?');
		if(conf){
			document.proses.action = 'del.php';
			document.proses.submit();
		}
		
	}
	</script>
<?php include_once('../_footer.php'); ?>