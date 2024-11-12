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
        text-align: center;
    }
    .next-movie {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2em;
    }
    .descripcion {
        display: flex;
        flex-direction: column;
        align-items: start;
    }
    .p-descripcion {
        text-align: left;
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
        <h1>Próxima pelicula de Marvel</h1>
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
    <section>
        <img src="<?= $data["poster_url"]; ?>" 
        style="border-radius: 20px"
        width="400" alt="poster de la proxima pelicula de marvel: <?= $data["title"] ?>"/>
    </section>
    <div>
        <h4>Fecha de estreno: <?= $data["release_date"] ?></h4>
        <h4>Descripción</h4>
        <p><?= $data["overview"] ?></p>
    </div>
    <hr>
    <hgroup>
        <p class="padding-bottom">El estreno siguiente es <b><?= $data["following_production"]["title"] ?></b></p>
        <div class="next-movie">
            <img src="<?= $data["following_production"]["poster_url"] ?>" alt="next movie" width="400" style="border-radius: 20px">
            <div class="descripcion">
                <h4>Descripción</h4>
                <p class="p-descripcion"><?= $data["following_production"]["overview"] ?></p>
            </div>
        </div>
    </hgroup>
</main>
