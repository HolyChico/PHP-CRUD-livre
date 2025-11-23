<?php
    define("HOST", "localhost"); //3307 é a porta do XAMPP, que estava dando erro na 3306 (nessa maquina)
    define("USER", "root");
    define("PASS", '');
    define("BASE", "restaurante_crud");

    $conn = new MySQLi(HOST, USER, PASS, BASE);

?>