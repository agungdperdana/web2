<?php 
session_start();
// cek sesi
if ( !isset($_SESSION["login"])) {
  exit(header("location: login.php"));
}
require 'library/function.php';

$artikel = queryartikel("SELECT artikel_tb.idartikel, artikel_tb.judul, artikel_tb.isi, artikel_tb.tgl_post, artikel_tb.gambar, artikel_tb.iduser, user_tb.name FROM artikel_tb, user_tb WHERE artikel_tb.iduser = user_tb.iduser ");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="css/form-validation.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="css/fixedColumns.dataTables.css">

    <title>Data artikel</title>
  </head>
  <body>
  <?php require 'library/navbar.php'; ?>
  <center>
		<h1 class="alert">DATA PESERTA DIDIK</h1>
	</center>
	<div class="col-md-12 col-md-offset-2 ">
		<div id="container">
			<div class="table-responsive">
				<a class="btn btn-outline-primary" href="tambahartikel.php">Tambah artikel</a>
				<br>
				<br>
				<table id="data" class="data table table-sm table-hover stripe row-border order-column " border="1" cellpadding="15"
				 cellspacing="0">
					<thead class="bg-success">
						<tr>
							<th></th>
							<th>AKSI</th>
							<th>JUDUL</th>

							<th>ISI</th>
							<th>TANGGAL POST</th>
							<th>GAMBAR</th>
							<th>USER</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ( $artikel as $row ) : ?>
						<tr align="center">
							<td></td>
							<td>
								<a class="btn btn-outline-primary" href="ubahartikel.php?id=<?= $row["idartikel"]; ?>">Ubah</a>
								<a class="btn btn-outline-danger" href="hapusartikel.php?id=<?= $row["idartikel"] ?>" onClick="return
									confirm('Yakin ingin menghapus data ?')" >Hapus</a>
								
							</td>
							<td>
								<?= $row["judul"] ?>
							</td>
                            
							<td>
								<?= $row["isi"] ?>
							</td>
                            <td>
								<?= $row["tgl_post"] ?>
							</td>
							
                            <td><img src="img/photo/<?= $row['gambar']; ?>" class="img-thumbnail" style="width:40px; height: 40px;"
								 align="center">
							</td>
							<td>
								<?= $row["name"] ?>
							</td>
						</tr>
						<?php $i ++ ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

    <h1>Data artikel</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
	<script src="js/dataTables.buttons.min.js"></script>
	<script src="js/buttons.flash.min.js"></script>
	<script src="js/jszip.min.js"></script>
	<script src="js/vfs_fonts.js"></script>
	<script src="js/buttons.html5.min.js"></script>
	<script src="js/buttons.print.js"></script>
	<script src="js/dataTables.fixedColumns.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/holder.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			var t = $('#data').DataTable({
				responsive: true,
				dom: 'Bfrtip',
				"paging": true,
				"autoWidth": true,
				"columnDefs": [{
					"visible": true,
					"targets": -1
				}],

				buttons: [
					'csv', 'excel', {
						extend: 'print',
						orientation: 'landscape',
						autoPrint: true,

						title: '',
						repeatingHead: {
							logo: '',
							logoPosition: 'lefts',
							logoStyle: '',
							title: '<h3>Rekap Data Peserta Didik</h3>'
						}
					}

				],



				"columnDefs": [{
					"searchable": false,
					"orderable": false,
					"targets": 0

				}],
				"order": [
					[1, 'asc']
				]
			});
			t.on('order.dt search.dt', function () {
				t.column(0, {
					search: 'applied',
					order: 'applied'
				}).nodes().each(function (cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();

		});
	</script>

  </body>
</html>


