<?php
error_reporting(E_ALL);
require_once('Agenda.php');
$agenda = Agenda::desserializar();

$contatos = $agenda->buscaContato($_GET['termo']);
foreach ($contatos as $contato) {
    $agenda->removeContato($contato);
}
Agenda::serializar($agenda);
header("Location: /agenda");
?>