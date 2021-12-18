<?php

namespace App\classes;

class Database
{
    public function dbConnection(){
        $host = 'localhost';
        $user = 'wdpfnlqz_php_crud_hamid';
        $pass = 'wdpfnlqz_php_crud_hamid';
        $db   = 'wdpfnlqz_php_crud_hamid';
        $link = mysqli_connect($host, $user, $pass, $db);
        return $link;
    }
}