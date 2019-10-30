<?php
error_reporting(E_ALL);
require_once('Agenda.php');
$agenda = Agenda::desserializar();

$contatos = $agenda->buscaContato($_GET['termo']);
if(sizeof($contatos) > 0) {
    $contato = $contatos[0];
    ?>
    <h3><?=$contato->get('nome')?></h3>
    <p>Endereço: <?=$contato->get('endereco')?></p>
    <p>E-mail: <?=$contato->get('endereco')?></p>
    <p>Contato: <?=$contato->get('contato')?></p>
    <?php
        if($contato instanceof PessoaFisica) {
    ?>
        <p>CPF: <?=$contato->get('CPF')?></p>
        <p>Data de Nascimento: <?=$contato->get('dataNascimento')?></p>
        <p>Estado CIVIL: <?=$contato->get('estadoCivil')?></p>
        <?php } else { ?>
        <p>CNPJ: <?=$contato->get('CNPJ')?></p>
        <p>Inscrição Estadual: <?=$contato->get('inscricaoEstadual')?></p>
        <p>Razão Social: <?=$contato->get('razaoSocial')?></p>
<?php } }?>
Agenda::serializar($agenda);
header("Location: /agenda");
?>