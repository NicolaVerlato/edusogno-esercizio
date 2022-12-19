<?php
include __DIR__ . '/UserController.php';
if (isset($_POST['registrati'])) {
    $successfull = UserController::save($_POST);
};
?>

<main>
    <section class="register pt-5">
        <h1>Crea il tuo account</h1>
        <div class="container-form">
            <form action="signup-success.html" method="POST">
                <div class="input">
                    <label for="name">Inserisci il nome</label>
                    <input type="text" placeholder="Mario" id="name" name="name">
                </div>
                <div class="input">
                    <label for="last_name">Inserisci il cognome</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Rossi">
                </div>
                <div class="input">
                    <label for="email">Inserisci l'e-mail</label>
                    <input type="mail" placeholder="name@example.com" id="email" name="email">
                </div>
                <div class="input">
                    <label for="password">Inserisci la password</label>
                    <input type="password" name="password" id="password" placeholder="Scrivila qui">
                </div>
                <div class="actions">
                    <button type="submit" name="registrati">REGISTRATI</button>
                </div>
            </form>
            <p class="question-link">Hai già un account? <a href="./index.php">Accedi</a></p>
        </div>
    </section>
</main>
<?php

?>
