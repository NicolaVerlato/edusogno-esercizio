<?php
session_start();
$_SESSION['isAuthorized'] = false;
include __DIR__ . '/UserController.php';
if (isset($_POST['login'])) {
    $response = UserController::autorize($_POST['email'], $_POST['password']);
    if (is_object($response)) {
        $_SESSION['nome'] = $response->nome;
        $_SESSION['email'] = $response->email;
        $_SESSION['isAuthorized'] = true;
        header("Location: ./index.php");
    }
}

?>

<main>
    <section class="login pt-5">
        <h1>Hai già un account?</h1>
        <div class="container-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input">
                    <label for="email">Inserisci l'e-mail</label>
                    <input type="mail" placeholder="name@example.com" id="email" name="email" value="">
                    <?php if ($response === "Email errata") : ?>
                        <div class="error-text">
                            <p><?= $response ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="input">
                    <label for="password">Inserisci la password</label>
                    <input type="password" name="password" id="password" placeholder="Scrivila qui"> 
                    <?php if ($response === 'Password sbagliata') : ?>
                        <div class="error-text">
                            <p><?= $response ?></p>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="actions">
                    <button type="submit" name="login">ACCEDI</button>
                </div>
            </form>
            <div class="question-link">
                <p>Non ricordi la password? <a href="./recupera-password.php">Recuperala qui</a></p>
                <p>Non hai ancora un profilo? <a href="./registrati.php">Registrati</a></p>
            </div>
        </div>
    </section>
</main>
<?php

?>