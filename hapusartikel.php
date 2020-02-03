<?php 
require 'library/function.php';

$id = $_GET["id"];

if ( hapusartikel( $id ) > 0) {
	echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href = 'displayartikel.php';

			</script>
			";
}
 else {
	echo "
			<script>
				alert('Data gagal dihapus');
				document.location.href = 'displayartikel.php';
			</script>
			";

}




 ?>