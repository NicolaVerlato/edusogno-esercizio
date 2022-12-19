<?php
include __DIR__ . '/User.php';
include __DIR__ . '/connection.php';

class UserController
{
    public static function save($data)
    {
        $new_utente = new User($data['name'], $data['last_name'], $data['email'], $data['password']);
        $query = "INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`) VALUES ('$new_utente->name','$new_utente->last_name','$new_utente->email','$new_utente->password')";
        DatabaseConnection::request($query, 'INSERT');
        return true;
    }
    public static function autorize($email, $password)
    {
        $query = "SELECT `email`, `password`,`nome` FROM `utenti` WHERE `email` = '$email'";
        $response = DatabaseConnection::request($query, 'SELECT');

        if (!$response) {
            $result = 'Email errata';
            return $result;
        }

        $result = $response->fetch_object();
        if ($result->password !== $password) {
            $result = 'Password sbagliata';
        }
        return $result;
    }
    public static function events($email)
    {
        $query = "SELECT * FROM `eventi` WHERE `attendees` LIKE '%$email%'";
        $response = DatabaseConnection::request($query, 'SELECT');
        if (!$response) {
            return false;
        }
        return $response;
    }
    public static function resetPassword($email, $password)
    {
        $query = "SELECT `email`, `password`,`nome`,`cognome` FROM `utenti` WHERE `email` = '$email'";
        $response = DatabaseConnection::request($query, 'SELECT');

        if (!$response) {
            $result = 'Email non esiste';
            return $result;
        }
        $query = "UPDATE `utenti` SET `password` = '$password' WHERE `email` = '$email'";
        DatabaseConnection::request($query, 'UPDATE');
        $result = true;
        return $result;
    }
};