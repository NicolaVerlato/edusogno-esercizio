<?php
session_start();
include __DIR__ . '/UserController.php';
$response = UserController::getEvents($_SESSION['email']);
if ($response) {
    $userEvents = $response->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Edusogno</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="assets/img/logo.svg" alt="Logo">
        </div>
    </header>
    <main>
        <section class="container">
            <h1 class="center blue">Ciao <?= $_SESSION['nome']; ?> ecco i tuoi eventi</h1>

                <div class="flex row">
                    <?php if ($response) : ?>
                        <?php foreach ($userEvents as $event) : ?>
                            <div class="col">
                                <div class="bullet">
                                    <h2><?= $event['nome_evento'] ?></h2>
                                    <p class="transparent"><?= $event['data_evento'] ?></p>
                                    <div>
                                        <button name="login" class="btn">JOIN</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="col">
                            <div class="bullet no-event">
                                <h2>NESSUN EVENTO</h2>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            
        </section>
    </main>
</body>

</html>