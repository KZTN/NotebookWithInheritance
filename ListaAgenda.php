<?php
require_once('Agenda.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="bootstrap.min.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <!-- As a link -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">IMC</a>
        </nav>
        <div class="container-fluid" style="margin-top: 10px">
            <div class="card">
                <div class="card-header">
                    Exibindo lista de contatos da Agenda
                </div>
                <div class="card-body">
                    <?php
                    if (file_exists("agenda.data")) {
                        // begin desserialização...
                        $file = fopen("agenda.data", 'r');
                        $content = fread($file, filesize("agenda.data"));
                        $agenda = unserialize($content);
                        fclose($file);
                        // end
                    } else {
                        $agenda = new Agenda();
                    }
                    $agenda->listaContatos();
                    ?>
                </div>
            </div>
        </div>
        <script src="bootstrap.min.js"></script>
    </body>
</html>