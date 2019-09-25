<?php
require_once("Contato.php");
class PessoaJuridica extends Contato {
    private $CNPJ;
    private $inscricaoEstadual;
    private $razaoSocial;

    public function __construct(string $CNPJ, string $inscricaoEstadual, string $razaoSocial, string $nome, string $endereco, string $email, string $contato) {
        $this->CNPJ = $CNPJ;
        $this->inscricaoEstadual = $inscricaoEstadual;
        $this->razaoSocial = $razaoSocial;
        parent::__construct($nome, $endereco, $email, $contato);
    }
    public function match($termo) : bool { 
        return $termo == $this->get('nome') || $termo == $this->CNPJ;
    }
    public function detalhar() : void {
        echo("----------\n");
        parent::detalhar();
        echo("CNPJ: {$this->CNPJ}\nInscrição Estadual: {$this->inscricaoEstadual}\nRazão Social: {$this->razaoSocial}\n");
    }
}
?>