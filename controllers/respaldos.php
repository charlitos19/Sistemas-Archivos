<?php 

	$db_host = "localhost";
	$db_name = "gestion_archivos";
	$db_user = "root";
	$db_pass = "Sistemas2022";

	$fecha = date("Ymd-His");

	$salida_sql = $db_name.'_'.$fecha.'.sql';
	$dump = "mysqldump -h$db_host -u$db_user -p$db_pass --opt $db_name > $salida_sql";
	system($dump, $output);

	$zip = new ZipArchive();
	$salida_zip = $db_name.'_'.$fecha.'.zip';
	if ($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true) {
		$zip->addFile($salida_sql);
		$zip->close();
		unlink($salida_sql);
		header("Location: $salida_zip");
	}else{
		echo "Error";
	}
 ?>