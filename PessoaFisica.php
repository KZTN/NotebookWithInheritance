<?php
require_once("Contato.php");
class PessoaFisica extends Contato {
    private $CPF;
    private $estadoCivil;
    private $dataNascimento;
    
    public function __construct(string $CPF, string $nome, string $endereco, string $dataNascimento, string $estadoCivil, string $contato) {
        $this->CPF = $CPF;
        $this->estadoCivil = $estadoCivil;
        $this->dataNascimento = $dataNascimento;
        parent::__construct($nome, $endereco, $contato);
    }
}
?>