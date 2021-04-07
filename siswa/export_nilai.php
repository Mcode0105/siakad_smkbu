<?php

include_once '../config/function.php';
		$kls = $_GET['kls'];
		$name  = $_GET['name'];
 header("Content-type: aplication/vnd-ms-excel");
 header("Content-Disposition: attachment; filename= transkip nilai  $name $kls.xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<table border="1" cellspacing="0" cellpadding="10">
	<p style="text-align: center;">Transkip Nilai</p>
	<p style="text-align: center;">SMK Full Day Bustanul Ulum Bulugading</p>
	<p>nama <?=$name; ?></p>
	<p>kelas <?=$kls; ?></p>

		<tr>
			<th rowspan="2">mapel</th>
			<th colspan="6">nilai pengetahuan</th>
			<th colspan="6">nilai keterampilan</th>
			<th rowspan="2">UTS</th>
			<th rowspan="2">UAS</th>
		</tr>
		<tr>
			<td>Kd1</td>
			<td>Kd2</td>
			<td>Kd3</td>
			<td>Kd4</td>
			<td>Kd5</td>
			<td>Kd6</td>
			<td>Kd1</td>
			<td>Kd2</td>
			<td>Kd3</td>
			<td>Kd4</td>
			<td>Kd5</td>
			<td>Kd6</td>
		</tr>
		<?php 
		$kls = $_GET['kls'];
		$name  = $_GET['name'];

	
                $as = mysqli_query($conn,"SELECT * FROM transkip_nilai WHERE nama = '$name' AND kelas = '$kls' ");
                while ($r = mysqli_fetch_assoc($as)) :

                 ?>
		<tr>
			<td><?=$r['mapel']; ?></td>
			<td><?=$r['np_kd1']; ?></td>
			<td><?=$r['np_kd2']; ?></td>
			<td><?=$r['np_kd3']; ?></td>
			<td><?=$r['np_kd4']; ?></td>
			<td><?=$r['np_kd5']; ?></td>
			<td><?=$r['np_kd6']; ?></td>
			<td><?=$r['nk_kd1']; ?></td>
			<td><?=$r['nk_kd2']; ?></td>
			<td><?=$r['nk_kd3']; ?></td>
			<td><?=$r['nk_kd4']; ?></td>
			<td><?=$r['nk_kd5']; ?></td>
			<td><?=$r['nk_kd6']; ?></td>
			<td><?=$r['uts']; ?></td>
			<td><?=$r['uas']; ?></td>
		</tr>
	<?php endwhile ?>
	</table>
</body>
</html>