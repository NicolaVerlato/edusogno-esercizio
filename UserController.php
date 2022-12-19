<?php
include __DIR__ . '/User.php';
include __DIR__ . '/connection.php';

class UserController
{
    // salvare un nuovo utente
    public static function store($data)
    {
        $new_utente = new User($data['name'], $data['last_name'], $data['email'], $data['password']);
        $query = "INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES ('$new_utente->name','$new_utente->last_name','$new_utente->email','$new_utente->password')";
        DatabaseConnection::request($query, 'INSERT');
        return true;
    }

    // validazione per login
    public static function validate($email, $password)
    {
        $query = "SELECT `email`, `password`,`nome` FROM `utenti` WHERE `email` = '$email'";
        $response = DatabaseConnection::request($query, 'SELECT');

        if (!$response) {
            $result = 'email error';
            return $result;
        }

        $result = $response->fetch_object();
        if ($result->password !== $password) {
            $result = 'password error';
        }
        return $result;
    }

    // in base alla mail del login si prendono gli eventi associati ad essa
    public static function getEvents($email)
    {
        $query = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$email%'";
        $response = DatabaseConnection::request($query, 'SELECT');
        if (!$response) {
            return false;
        }
        return $response;
    }

    // funzione per resettare la password
    public static function resetPassword($email, $password)
    {
        $query = "SELECT `email`, `password`,`nome`,`cognome` FROM `utenti` WHERE `email` = '$email'";
        $response = DatabaseConnection::request($query, 'SELECT');

        if (!$response) {
            $result = 'email error';
            return $result;
        }
        $query = "UPDATE `utenti` SET `password` = '$password' WHERE `email` = '$email'";
        DatabaseConnection::request($query, 'UPDATE');
        $result = true;
        header("Location: ./reset-password-success.html");
        return $result;
    }
};