<?php 
// Récupération des paramètres
$albumId = isset($_GET['id']) ? $_GET['id'] : null;

$error = null;
if (empty($albumId)) {
    $error = "Paramètre id manquant";
}

// Liste des albums avec leurs photos (on simule une récupération dynamique en base de données)
$albums = array(
    1 => array(
        'id' => 1,
        'name' => 'Alpes 2015',
        'description' => 'Un souvenir de mes vacances en Haute-Savoie (juillet 2015).',
        'pictures'=> array(
			array('url' => 'albums/alpes2015/photo1.jpg', 'legend' => 'Ma belle photo 1'),
			array('url' => 'albums/alpes2015/photo2.jpg', 'legend' => 'Ma belle photo 2'),
			array('url' => 'albums/alpes2015/photo3.jpg', 'legend' => 'Ma belle photo 3'),
			array('url' => 'albums/alpes2015/photo4.jpg', 'legend' => 'Ma belle photo 4'),
			array('url' => 'albums/alpes2015/photo5.jpg', 'legend' => 'Ma belle photo 5'),
			array('url' => 'albums/alpes2015/photo6.jpg', 'legend' => 'Ma belle photo 6'),
			array('url' => 'albums/alpes2015/photo7.jpg', 'legend' => 'Ma belle photo 7'),
			array('url' => 'albums/alpes2015/photo8.jpg', 'legend' => 'Ma belle photo 8'),
			array('url' => 'albums/alpes2015/photo9.jpg', 'legend' => 'Ma belle photo 9'),
			array('url' => 'albums/alpes2015/photo10.jpg', 'legend' => 'Ma belle photo 10'),
			array('url' => 'albums/alpes2015/photo11.jpg', 'legend' => 'Ma belle photo 11'),
			array('url' => 'albums/alpes2015/photo12.jpg', 'legend' => 'Ma belle photo 12'),
			array('url' => 'albums/alpes2015/photo13.jpg', 'legend' => 'Ma belle photo 13'),
			array('url' => 'albums/alpes2015/photo14.jpg', 'legend' => 'Ma belle photo 14'),
			array('url' => 'albums/alpes2015/photo15.jpg', 'legend' => 'Ma belle photo 15')
		)
    ),
    2 => array(
		'id' => 2,
		'name' => 'Sud 2014',
		'description' => 'Un souvenir de mes vacances à Marseille (juillet 2014).',
		'pictures'=> array(
            array('url' => 'albums/sud2014/photo1.jpg', 'legend' => 'Ma belle photo 1'),
            array('url' => 'albums/sud2014/photo2.jpg', 'legend' => 'Ma belle photo 2'),
            array('url' => 'albums/sud2014/photo3.jpg', 'legend' => 'Ma belle photo 3'),
            array('url' => 'albums/sud2014/photo4.jpg', 'legend' => 'Ma belle photo 4'),
            array('url' => 'albums/sud2014/photo5.jpg', 'legend' => 'Ma belle photo 5'),
            array('url' => 'albums/sud2014/photo6.jpg', 'legend' => 'Ma belle photo 6'),
            array('url' => 'albums/sud2014/photo7.jpg', 'legend' => 'Ma belle photo 7'),
            array('url' => 'albums/sud2014/photo8.jpg', 'legend' => 'Ma belle photo 8'),
            array('url' => 'albums/sud2014/photo9.jpg', 'legend' => 'Ma belle photo 9'),
            array('url' => 'albums/sud2014/photo10.jpg', 'legend' => 'Ma belle photo 10'),
            array('url' => 'albums/sud2014/photo11.jpg', 'legend' => 'Ma belle photo 11'),
            array('url' => 'albums/sud2014/photo12.jpg', 'legend' => 'Ma belle photo 12'),
            array('url' => 'albums/sud2014/photo13.jpg', 'legend' => 'Ma belle photo 13'),
            array('url' => 'albums/sud2014/photo14.jpg', 'legend' => 'Ma belle photo 14'),
            array('url' => 'albums/sud2014/photo15.jpg', 'legend' => 'Ma belle photo 15')
        )
    )
);

// Construction de la réponse JSON
if ($albumId !== null && !empty($albums[$albumId])) {
    $json = json_encode(array('album' => $albums[$albumId]));
} else if ($albumId !== null) {
	$error = "Identifiant d'album inconnu";
}

if ($error !== null) {
    http_response_code(404);
    header("Content-Type: application/json");
    header('Status: 404');
    echo '{"error": "'.$error.'"}';
} else {
    header("Content-Type: application/json");
    echo $json;
}