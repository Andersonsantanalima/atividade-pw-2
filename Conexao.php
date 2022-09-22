<?php
define('HOST','localhost');
define('DB','aula_avacada');
define('USER','root');
define('PASSW', '');

$cx = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASSW);