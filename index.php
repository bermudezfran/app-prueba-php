<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";

// llamada a la api utilizando Curl, lo llamaremos ch
$ch = curl_init(API_URL);
//  recibir el resultado de la api y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

# ejecutar el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

?>
<style>
    .padding-bottom {
        padding-bottom: 1em;
    }
    .center-main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<head>
    <title>La próxima pelicula de Marvel estudios</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>
<main class="center-main">
    <article>
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> dias</h3>
    </article>
    <section>
        <img src="<?= $data["poster_url"]; ?>" 
        style="border-radius: 20px"
        width="400" alt="poster de la proxima pelicula de marvel: <?= $data["title"] ?>"/>
    </section>
    <article>
        <h4>Fecha de estreno: <?= $data["release_date"] ?></h4>
        <h4>Descripción</h4>
        <p><?= $data["overview"] ?></p>
    </article>
    <hr>
    <hgroup>
        <p class="padding-bottom">El estreno siguiente es <b><?= $data["following_production"]["title"] ?></b></p>
        <img src="<?= $data["following_production"]["poster_url"] ?>" alt="next movie" width="400" style="border-radius: 20px">
    </hgroup>
</main>
