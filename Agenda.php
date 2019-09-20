<?php
require_once("Contato.php");
require_once("PessoaJuridica.php");
require_once("PessoaFisica.php");
class Agenda {
    private $contatos;
    public function __construct() {
        $this->contatos = [];
    }
    public function adicionaContato(Contato $contato) : void {
        $this->contatos=$contato;
    }
    public function removeContato(Contato $contato) : void {
        $indice = array_search($contato, $this->contatos);
        if($indice !== false) {
            array_splice($this->contatos, $indice, 0);
        }
    }
    public function listaContatos() : void {
        foreach($this->contattos as $contato) {
            $contato->detalhar();
        }
    }
    public function buscaContato(string $termo) : array {
        $contatos = array();
        foreach ($this->contatos as $contato) {
            if($contato->match($termo)){
                array_push($contatos, $contato);
            }
        }
        return $contato;
    }
}
?>