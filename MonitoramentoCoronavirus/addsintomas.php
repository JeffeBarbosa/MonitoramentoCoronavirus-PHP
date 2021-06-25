<?php
require_once 'conecta.php';
session_start();


$faltaar = isset($_POST['faltaar']) ? $_POST['faltaar'] : null;
$febre = isset($_POST['febre']) ? $_POST['febre'] : null;
$tosse = isset($_POST['tosse']) ? $_POST['tosse'] : null;
$dorcorpo = isset($_POST['dorcorpo']) ? $_POST['dorcorpo'] : null;
$dorgarganta = isset($_POST['dorgarganta']) ? $_POST['dorgarganta'] : null;
$diarreia = isset($_POST['diarreia']) ? $_POST['diarreia'] : null;
$coriza = isset($_POST['coriza']) ? $_POST['coriza'] : null;
$codpac = $_SESSION['codUser'];
$sitcovid = isset($_POST['resultado_covid']) ? $_POST['resultado_covid'] : null;






$sql="INSERT INTO  sintoma(falsin, febsin, tossin, dorsin, garsin, diasin, corsin,codpac, covsin) VALUES (:faltaar, :febre,  :tosse, :dorcorpo, :dorgarganta, :diarreia, :coriza, :codpac, :sitcovid)";
$qryAdd= $PDO->prepare($sql);
$qryAdd->bindParam(':faltaar', $faltaar);
$qryAdd->bindParam(':febre', $febre);
$qryAdd->bindParam(':tosse', $tosse);
$qryAdd->bindParam(':dorcorpo', $dorcorpo);
$qryAdd->bindParam(':dorgarganta', $dorgarganta);
$qryAdd->bindParam(':diarreia', $diarreia);
$qryAdd->bindParam(':coriza', $coriza);
$qryAdd->bindParam(':codpac', $codpac);
$qryAdd->bindParam(':sitcovid', $sitcovid);


if ($qryAdd->execute()) {
	header('Location: index.php');             
} else {
	echo "Erro ao cadastrar o paciente";
	print_r($qryAdd->errorInfo());
}

?>