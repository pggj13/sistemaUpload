<?php
try{
    $db=new PDO("mysql:dbname=upload;charset=utf8;host=localhost","root","");
}  catch (PDOException $e){
    echo $e->getMessage();
}