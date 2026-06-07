<?php
$connect = new PDO("mysql:host=db;dbname=trabalho_PW;charset=utf8", "root", "root");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);