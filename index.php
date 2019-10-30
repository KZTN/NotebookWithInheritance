<?php
    require_once('Agenda.php');
    $agenda = Agenda::desserializar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
    <title>Agenda - Início</title>
</head>
<body>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Agenda 1.0</a>
    </nav>
    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Novo Contato
                    </div>
                    <div class="card-body">
                        <form action="salvar.php" method="POST">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" required="required" placeholder="Informe seu nome completo">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" class="form-control" name="endereco" id="endereco" required="required" placeholder="Informe seu endereço">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" required="required" placeholder="Informe seu email. ex: fulano@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="contato">Telefone</label>
                                <input type="text" class="form-control" name="contato" id="contato" required="required" placeholder="Informe seu telefone. ex: (84) 99999-9999">
                            </div>
                            <div class="form-group">
                                <label>Selecione uma das opções</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="pf" value="PF" checked>
                                    <label class="form-check-label" for="pf">Pessoa Física</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="pj" value="PJ">
                                    <label class="form-check-label" for="pj">Pessoa Jurídica</label>
                                </div>
                            </div>
                            <div id="pessoa_fisica">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Informe o CPF do contato. ex: 000.000.000-00">
                                </div>
                                <div class="form-group">
                                    <label for="dataNascimento">Data de Nascimento</label>
                                    <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="Informe o dia que o contato nasceu. ex: 00/00/0000">
                                </div>
                                <div class="form-group">
                                    <label for="estadoCivil">Estado Civil</label>
                                    <select class="form-control" id="estadoCivil" name="estadoCivil">
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Viúvo">Viúvo</option>
                                        <option value="Desquitado">Desquitado</option>
                                    </select>
                                </div>
                            </div>
                            <div id="pessoa_juridica" style="display: none;">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" class="form-control" name="cnpj" id="cnpj"placeholder="Informe o CNPJ do contato. ex: 00.000.000/0000-00">
                                </div>
                                <div class="form-group">
                                    <label for="inscricaoEstadual">Inscrição Estadual</label>
                                    <input type="text" class="form-control" name="inscricaoEstadual" id="inscricaoEstadual" placeholder="Informe a inscrição estadual do contato.">
                                </div>
                                <div class="form-group">
                                    <label for="razaoSocial">Razão Social</label>
                                    <input type="text" class="form-control" name="razaoSocial" id="razaoSocial" placeholder="Informe a razão social do contato.">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Contatos
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($agenda->getContatos() as $contato) { ?>
                                <tr>
                                    <td><?=$contato->get('nome')?></td>
                                    <td><?=$contato->get('endereco')?></td>
                                    <td><?=$contato->get('contato')?></td>
                                    <td><a href="excluir.php?termo=<?=$contato->get('nome')?>" class="btn btn-danger excluir">Excluir</a></td>
                                    <td><!-- Botão para acionar modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                                          Detalhar
                                        </button>                              
                                        <!-- Modal -->
                                        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalhando contato</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                ...
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="button" class="btn btn-primary">Salvar mudanças</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div></td>
                                <tr>
                                
                                <?php }?>
                                
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('input[name=tipo]').on('change', function(){
                if ($(this).val() == 'PF') {
                    $("#pessoa_fisica").fadeIn();
                    $("#pessoa_juridica").hide();
                } else {
                    $("#pessoa_fisica").hide();
                    $("#pessoa_juridica").fadeIn();
                }
            })
            $('.excluir').on('click', function(evt) {
                if(!confirm("Deseja realmente excluir?")) {
                        evt.preventDefault();
                }
            });
            $('.detalhar').on('click', function() {
                termo = $(this).data('termo');
                $.get('detalhar.php?termo=' + termo, function(data) {
                    $('.modal-body').html(data);
                }, 'text');
            });
        });
    </script>
</body>
</html>