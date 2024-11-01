<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
// Inicializar una nueva sesión de CURL
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

$data = json_decode($result, true);

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP API</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
  <main class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-4">
      <section class="card">
        <img class="img-fluid mx-auto d-block" src="<?= $data['poster_url']; ?>" alt="Poster de <?= $data['title']; ?>" width="200">
        <hgroup class="card-body text-center">
          <h3 class="card-title fs-4"><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días</h3>
          <p class="card-text fs-6">Fecha de estreno: <?= $data['release_date']; ?></p>
          <p class="card-text fs-6">La siguiente es: <?= $data['following_production']['title']; ?></p>
        </hgroup>
      </section>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>