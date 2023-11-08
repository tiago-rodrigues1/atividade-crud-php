<?php
$db = new PDO("sqlite:../musicas.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$nome = $_GET["nome"];
$banda = $_GET["banda"];

$q = $db->prepare("INSERT INTO musicas (nome, banda)
    VALUES (:nome, :banda)");

$q->bindParam(":nome", $nome);
$q->bindParam(":banda", $banda);

$q->execute();

header("Location:../");