<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

// llamada a la api utilizando Curl
$ch = curl_init(API_URL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

// Verificar si la API devolvió datos válidos
if (is_array($data) && isset($data["title"])) {
    $title = $data["title"];
    $days_until = $data["days_until"] ?? "desconocido";
    $poster_url = $data["poster_url"] ?? "";
    $release_date = $data["release_date"] ?? "Fecha no disponible";
    $overview = $data["overview"] ?? "Descripción no disponible";
    
    // Datos de la siguiente producción
    $next_title = $data["following_production"]["title"] ?? "No disponible";
    $next_poster_url = $data["following_production"]["poster_url"] ?? "";
    $next_overview = $data["following_production"]["overview"] ?? "Descripción no disponible";
} else {
    $title = "No se pudo obtener la información";
    $days_until = $poster_url = $release_date = $overview = $next_title = $next_poster_url = $next_overview = "Información no disponible";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>La próxima película de Marvel Studios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<style>
    .padding-bottom { padding-bottom: 1em; }
    .center-main { display: flex; flex-direction: column; align-items: center; text-align: center; }
    .next-movie { display: flex; justify-content: center; align-items: center; gap: 2em; }
    .descripcion { display: flex; flex-direction: column; align-items: start; }
    .p-descripcion { text-align: left; }
</style>
<body>
<main class="center-main">
    <h1>Próxima película de Marvel</h1>
    <h3><?= $title ?> se estrena en <?= $days_until ?> días</h3>
    <section>
        <img src="<?= $poster_url ?>" style="border-radius: 20px" width="400" alt="Poster de la próxima película de Marvel: <?= $title ?>"/>
    </section>
    <div>
        <h4>Fecha de estreno: <?= $release_date ?></h4>
        <h4>Descripción</h4>
        <p><?= $overview ?></p>
    </div>
    <hr>
    <hgroup>
        <p class="padding-bottom">El siguiente estreno es <b><?= $next_title ?></b></p>
        <div class="next-movie">
            <img src="<?= $next_poster_url ?>" alt="Siguiente película" width="400" style="border-radius: 20px">
            <div class="descripcion">
                <h4>Descripción</h4>
                <p class="p-descripcion"><?= $next_overview ?></p>
            </div>
        </div>
    </hgroup>
</main>
</body>
</html>