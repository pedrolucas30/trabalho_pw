<?php
$connect = new PDO("mysql:host=localhost;dbname=trabalho_pw;charset=utf8", "root", "");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);