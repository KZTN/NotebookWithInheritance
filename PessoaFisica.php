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
        parent::__construct($nome, $endereco, $email, $contato);
    }
    public function match($termo) : bool { 
        return $termo == parent::get('nome') || $termo == $this->CPF;
    }
    public function detalhar() : void {
        echo("----------\n");
        parent::detalhar();
        echo("CPF: {$this->CPF}\nEstado Civil: {$this->estadoCivil}\nData Nascimento: {$this->dataNascimento}\n");
    }
}
?>