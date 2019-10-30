<?php
require_once("Contato.php");
require_once("PessoaJuridica.php");
require_once("PessoaFisica.php");
class Agenda {
    private $contatos;
    public function __construct() {
        $this->contatos = array();
    }
    public function getContatos() : array {
        return $this->contatos;
    }
    public function adicionaContato(Contato $contato) : void {
        array_push($this->contatos, $contato);
    }
    public function removeContato(Contato $contato) : void {
        $indice = array_search($contato, $this->contatos);
        array_splice($this->contatos, $indice, 1);
    }
    public function listaContatos() : void {
        foreach($this->contatos as $contato) {
            $contato->detalhar();
        }
    }
    public function buscaContato(string $termo) : array {
        $contatosEncontrados = array();
        foreach ($this->contatos as $contato) {
            if($contato->match($termo)){
                array_push($contatosEncontrados, $contato);
            }
        }
        return $contatosEncontrados;
    }
    public static function serializar(Agenda $agenda) : void {
        // begin serialização
        $file = fopen("agenda.data", "w");
        $content = serialize($agenda);
        fwrite($file, $content);
        fclose($file);
        // end
    }
    public static function desserializar() : Agenda {
        if (file_exists("agenda.data")) {
            // begin desserialização...
            $file = fopen("agenda.data", 'r');
            $content = fread($file, filesize("agenda.data"));
            $agenda = unserialize($content);
            fclose($file);
            return $agenda;
            // end
        } else {
            return new Agenda();
        }
    }
}
?>