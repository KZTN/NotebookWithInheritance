<?php
require_once('Agenda.php');
require_once('PessoaFisica.php')
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <!-- As a link -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Agenda</a>
        </nav>
        <div class="container-fluid" style="margin-top: 10px">
            <div class="card">
                <div class="card-header">
                    Informe os dados abaixo
                </div>
                <div class="card-body">
                <form action="AdicionaContatoAgenda.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" required="required">
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço: </label>
                        <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="emailHelp" required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">email: </label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" required="required">
                    </div>
                    <div class="form-group">
                        <label for="contato">contato: </label>
                        <input type="text" class="form-control" id="contato" name="contato" aria-describedby="emailHelp" required="required">
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF: </label>
                        <input type="text" class="form-control" id="CPF" name="CPF" aria-describedby="emailHelp" required="required">
                    </div> 
                    <div class="form-group">
                        <label for="estadoCivil">Estado Civil: </label>
                        <input type="text" class="form-control" id="estadoCivil" name="estadoCivil" aria-describedby="emailHelp" required="required">
                    </div> 
                    <div class="form-group">
                        <label for="dataNascimento">Data Nascimento: </label>
                        <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" aria-describedby="emailHelp" required="required">
                    </div> 
                    <div class="form-group text-right">
                        <button class="btn btn-success" type="submit">
                            Enviar
                        </button>
                    </div>
                </div>

        </div>
        <script src="bootstrap.min.js"></script>
    </body>
</html>