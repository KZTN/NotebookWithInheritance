<?php
error_reporting(E_ALL);
require_once('Agenda.php');
$agenda = Agenda::desserializar();

if ($_POST['tipo'] == 'PF') {
    $agenda->adicionaContato(new PessoaFisica($_POST['cpf'], $_POST['estadoCivil'], $_POST['dataNascimento'], $_POST['nome'], $_POST['endereco'], $_POST['email'], $_POST['contato']));
} else {
    $agenda->adicionaContato(new PessoaJuridica($_POST['cnpj'], $_POST['inscricaoEstadual'], $_POST['razaoSocial'], $_POST['nome'], $_POST['endereco'], $_POST['email'], $_POST['contato']));
}
Agenda::serializar($agenda);
header("Location: /agenda");
?>