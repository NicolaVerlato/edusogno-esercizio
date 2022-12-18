<?php
class DatabaseConnection
{
    public static $host = "127.0.0.1";
    public static $username = 'root';
    public static $password = 'root';
    public static $db = 'edusogno';
    public static $port = '3306';

    public static function connect_to_db()
    {
        $mysql = mysqli_connect($host, $username, $password, $db, $port);
        if ($mysql->connect_errno) {
            exit('Connection error: ' . $mysql->connect_error);
        };
        return $mysql;
    }

    public static function request($query, $typeQuery)
    {
        $mysql = connect_to_db();
        if ($typeQuery === 'INSERT' || $typeQuery === 'UPDATE') {
            if (false === mysqli_query($mysql, $query)) {
                exit("Error: Query error " . mysqli_error($mysql));
            };
            return;
        };
        if ($typeQuery === 'SELECT') {
            $response = mysqli_query($mysql, $query);
            if (!$response->num_rows <= 0) {
                mysqli_close($mysql);
                return $response;
            } else {
                mysqli_close($mysql);
                return false;
            }
        }
        mysqli_close($mysql);
    }
}
?>