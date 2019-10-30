<?php
require_once("Agenda.php");
require_once("PessoaJuridica.php");
require_once("PessoaFisica.php");
require_once("Contato.php");
                if (file_exists("agenda.data")) {
                    // begin desserialização...
                    $file = fopen("agenda.data", 'r');
                    $content = fread($file, filesize("agenda.data"));
                    $agenda = unserialize($content);
                    fclose($file);
                    echo("entrei na primeira opção");
                } else {
                    echo("entrei na segunda opção");

                    $agenda = new Agenda();
                }
                    $pessoa = new PessoaFisica($_POST['CPF'], $_POST['estadoCivil'], $_POST['dataNascimento'], $_POST['nome'], $_POST['endereco'], $_POST['email'], $_POST['contato']);
                    $agenda->adicionaContato($pessoa);
                    $file = fopen("agenda.data", "w");
                    $content = serialize($agenda);
                    fwrite($file, $content);
                    fclose($file);
                    ?>