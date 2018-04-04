<?php

require 'db_access.php';

/* Script PHP pour remplir la base de donnees pour des tests */

for ($i = 1; $i < 1000; $i++) {

     $aleaLat = rand(480200, 482000);
     $aleaLat = $aleaLat / 10000;
     $aleaLong = rand(-14400, -18400);
     $aleaLong = $aleaLong / 10000;

     $dateTmp = round(microtime(true) * 1000);
     $randIdHub = rand(1,2);
     $hash = hash('sha256', $dateTmp);
     $bool = $stmt_insertMetaMesures->execute(array(':id_hub' => $randIdHub, ':date' => $dateTmp, ':gps_long' => $aleaLong, ':gps_lat' => $aleaLat, ":hash" => $hash));
     
     $randIdCapteur = rand(1,4);
     $randValeur = rand(0,10000);

     $bool = $stmt_insertMesures->execute(array(':id_capteur' => $randIdCapteur, ':id_meta' => $i, ':valeur' => $randValeur));

}
 ?>
