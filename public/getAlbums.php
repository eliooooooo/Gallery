<?php 
header("Content-Type: application/json");

// Liste des photos (on simule une récupération dynamique en base de données)
$albums = array(
    array('id'=>1, 'name'=>'Alpes 2015'),
    array('id'=>2, 'name'=>'Sud 2014')
);

// Construction de la réponse JSON
$json = json_encode(array('albums' => $albums));

// Envoi de la réponse JSON
echo $json;