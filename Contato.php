<?php
class Contato {
    private $nome;
    private $endereco;
    private $email;
    private $contato;
    public function  __construct(string $nome, string $endereco, string $email, string $contato) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->contato = $contato;
    }
    public function get(string $propiedade) : string {
        return $this->{$propiedade};
    }
    public function set(string $propiedade, string $new) : void {
        $this->{$propiedade} = $new;
    }
    public function detalhar() : void {
        echo ("Nome: {$this->nome}\nEndereço: {$this->Endereco}\nEmail: {$this->email}\nContato: {$this->contato}\n");
    }
}
?>