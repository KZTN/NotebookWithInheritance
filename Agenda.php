<?php
require_once("Contato.php");
class Agenda {
    private $contatos;
    public function __construct() {
        $this->contatos = [];
    }
    public function adicionaContato(Contato $contato) {
        $this->contatos=$contato;
    }
    public function removeContato(Contato $contato) {
        $indice = array_search($contato, $this->contatos);
        if($indeice === false) {
            array_splice($this->contatos, $indice, 0);
        }
    }
    public function listaContatos() {
        foreach($this->contattos as $contato) {
            $contato->detalhar();
        }
    }
}
?>