<?php
session_start();

include __DIR__ . '/UserController.php';
if (isset($_POST['reset'])) {
    $response = UserController::resetPassword($_POST['email'], $_POST['password']);
} else{
    $response = null;
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
            <h1 class="center blue">Non ricordi la password?</h1>
            
            <div class="form row">

                <?php if ($response == 'email error') : ?>
                    <div>
                        <p class="error-text">Questa mail non è presente nel nostro database</p>
                    </div>
                <?php endif; ?>

                <form class="col" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    
                    <div class="input">
                        <label for="email">Inserisci l'e-mail</label>
                        <input type="mail" placeholder="name@example.com" id="email" name="email" value="">
                    </div>

                    <div class="input">
                        <label for="password">Inserisci la nuova password</label>
                        <input type="password" name="password" id="password" placeholder="Scrivila qui"> 
                    </div>
                    <div class="actions">
                        <button type="submit" name="reset" class="btn">Reimposta Password</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>