<?php
require_once("Contato.php");
class PessoaFisica extends Contato {
    private $CPF;
    private $estadoCivil;
    private $dataNascimento;
    
    public function __construct(string $CPF, string $estadoCivil, string $dataNascimento, string $nome, string $endereco, string $email, string $contato) {
        $this->CPF = $CPF;
        $this->estadoCivil = $estadoCivil;
        $this->dataNascimento = $dataNascimento;
        parent::__construct($nome, $endereco, $contato);
    }
    public function match($termo) : bool { 
        return $termo == $this->get('nome') || $termo == $this->CPF;
    }
    public function detalhar() : void {
        parent::detalhar();
        echo("CPF: {$this->CPF}\eEstado Civil: {$this->estadoCivil}\Data Nascimento: {$this->dataNascimento}");
    }
}
?>