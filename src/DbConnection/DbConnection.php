<?php


namespace App\DbConnection;


use PDO;

class DbConnection
{
    /**
     * Database connection
     *
     * DB         ⇒ mySQL     <br>
     * Host       ⇒ 127.0.0.1 <br>
     * Port       ⇒ 3306      <br>
     * Table name ⇒ items     <br>
     * User       ⇒ Root      <br>
     *
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        // create a new database connection
        $db = new PDO('mysql:host=127.0.0.1;dbname=shopinglist', 'root', 'password');

        // set the error mode to help debugging throw PDOException
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // set return type to an array indexed by column name
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $db;
    }
}