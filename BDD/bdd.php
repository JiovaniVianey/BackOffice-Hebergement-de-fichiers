<?php
include_once("parametres.php");
$param = 'mysql:host='. HOST .';dbname='. DBNAME .';charset=utf8';
try {
    $bdd = new PDO($param, "root", "");
} catch(Exception $e) {
    echo $e;
}
?>