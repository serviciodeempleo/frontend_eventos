<?php
header("Access-Control-Allow-Origin: *");
// Se invoca la conexión
require ("conexion.php");

$response = array();

// Define el query .... para buscar el total de las cantidades
$query_totales = "SELECT 
(SELECT SUM(i.inscritos) AS total_inscritos FROM eventocentros AS i WHERE i.no_sum_inscritos = 0) AS total_inscritos,
(SELECT SUM(o.orientados) AS total_orientados FROM eventocentros AS o) AS total_orientados,
(SELECT SUM(rt.remitidos_taller) AS total_remitidos_taller FROM eventocentros AS rt) AS total_remitidos_taller,
(SELECT SUM(re.remitidos_empresa) AS total_remitidos_empresa FROM eventocentros AS re) AS total_remitidos_empresa
FROM eventocentros";

$result_totales = mysqli_query($conexion, $query_totales);

if ($result_totales) {
    if (mysqli_num_rows($result_totales) > 0) {
        while ($row = mysqli_fetch_assoc($result_totales)) {
            $response["inscritos"] = $row["total_inscritos"];
            $response["orientados"] = $row["total_orientados"];
            $response["remitidos_taller"] = $row["total_remitidos_taller"];
            $response["remitidos_empresa"] = $row["total_remitidos_empresa"];
        }
    }
    $response["status"] = "SUCCESS";
} else
	$response["status"] = "NOT FOUND";

//echo $_GET['callback'] . '(' . json_encode($status) . ')';
echo json_encode($response);

mysqli_close($conexion);
?>