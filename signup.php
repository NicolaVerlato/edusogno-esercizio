<?php
include __DIR__ . '/UserController.php';
if (isset($_POST['registrati'])) {
    $successfull = UserController::save($_POST);
    header("Location: ./signup-success.html");
};
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
            <h1 class="center blue">Crea il tuo account</h1>
            <div class="form row">
                <form method="POST" class="col">
                    <div class="input">
                        <label for="name">Inserisci il nome</label><br>
                        <input type="text" placeholder="Mario" id="name" name="name">
                    </div>
                    <div class="input">
                        <label for="last_name">Inserisci il cognome</label><br>
                        <input type="text" name="last_name" id="last_name" placeholder="Rossi">
                    </div>
                    <div class="input">
                        <label for="email">Inserisci l'e-mail</label><br>
                        <input type="mail" placeholder="name@example.com" id="email" name="email">
                    </div>
                    <div class="input">
                        <label for="password">Inserisci la password</label><br>
                        <input type="password" name="password" id="password" placeholder="Scrivila qui">
                    </div>
                    <div class="actions">
                        <button type="submit" name="registrati" class="btn">REGISTRATI</button>
                    </div>
                    <p class="question-link">Hai già un account? <a href="./login.php">Accedi</a></p>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
    
    

