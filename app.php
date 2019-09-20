<?php
require_once("PessoaFisica.php");
require_once("PessoaJuridica.php");
$agenda = new Agenda();
$op = readline("Bem-vindo a sua agenda\nEscolha uma das opções\n0: Sair\t1: Listar\t2: Adicionar\t3: Remover\t4: Pesquisar\n");
do {
    switch ($op) {
        case 1:
            $agenda->listaContatos();
            break;
        case 2:
            
            $nome = readline("Informe o nome\n");
            $endereco = readline("Informe o endereço\n");
            $email = readline("Informe o email\n");
            $contato = readline("Informe o Contato\n");
            $op2 = readline("Informe o tipo de pessoa(1: jurídica 2: física)\n");
            if($op2 == 1) {
                $CPF = readline("Informe o CPF\n");
                $estadoCivil = readline("Informe o estado cifilF\n");
                $dataNascimento = readline("Informe a data de nascimento\n");
                $agenda->adicionaContato(new PessoaFisica($CPF, $estadoCivil, $dataNascimento, $nome, $endereco, $email, $contato));
            } elseif($op2 == 2) {
                $CNPJ = readline("Informe o CNPJ\n");
                $inscricaoEstadual = readline("Informe a inscrição estadual\n");
                $razaoSocial = readline("Informe a razão social\n");
                $agenda->adicionaContato(new PessoaJuridica($CNPJ, $inscricaoEstadual, $razaoSocial, $nome, $endereco, $email, $contato));
            } else {
                echo("opção inválida, fim de programa\n");
                return;
            }
            break;
        case 3:
            $agenda->listarContatos();
            $termo = readline("Informe nome, cpf ou cnpj do contato para ser removido\n");
            $contatos = $agenda->Pesquisar($termo);
            echo("Resultado da pesquisa\n---------\n");
            foreach ($contatos as $contato) {
                $agenda->removerContato($contato);
            }
            echo("----------\n");
            break;
        case 4:
            $termo = readline("Informe nome, cpf ou cnpj do contato para ser removido\n");
            $contatos = $agenda->Pesquisar($termo);
            echo("Resultado da pesquisa\n---------\n");
            foreach ($contatos as $contato) {
                $contato->detalhar();
            }
            echo("----------\n");
            break;
        case 0:
            echo("fim de programa");
            return;
            break;
        default:
            # code...
            break;
    }
} while($op!=0);
?>