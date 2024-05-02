<?php
#LLAMAR A UNA API
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL = cURL handle
$ch = curl_init(API_URL);
#Indicar que queremos recibir el resultado de la peticion y no mostrarla en patalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#Ejecutar la peticon y guardamos el resultado
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);

// una alternativa seria utilizzar file_get_contents
// $result = file_get_contents(API_URL); // si solo quieres hacer un get de una api

?>

<head>
    <meta charset="UTF-8"/>
    <title>La proxima pelicula de marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
</head>

<main>
    
    <section>
        <img src="<?php $data["poster_url"]; ?>" width="500" alt="Poster de <?php $data["title"]; ?>"
        style="border-radius: 16px"/>
    </section>

    <hgroup>
        <h3><?php $data["title"]; ?> Se estrena en <?php $data["days_until"];?> dias</h3>
        <p>Fecha de estreno: <?php $data["release_date"]; ?></p>
        <p>La siguiente es: <?php $data["following_production"]["title"];?></p>
    </hgroup>

</main>

<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0;
    }
</style>