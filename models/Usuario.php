<?php
require_once 'Classes/bancoDeDados.php';

class Usuario implements Template{
    private $id_usuario;
    private $id_empresa;
    private $nome_usuario;
    private $login_usuario;
    private $senha_usuario;
    private $tipo_usuario;
    private $data_cadastro;
    private $status_usuario;

    private $opcao = ['const' => 8];

    public function tabela(){
        return (string) 'usuario';
    }

    public function modelo(){
        return (array) ['id_usuario' => (int) 0, 'id_empresa' => (int) 0, 'nome_usuario' => (String) '', 'login_usuario' => (string) '', 'senha_usuario' => (string) '', 'tipo_usuario' => (string ) '', 'data_cadastro' => 'date', 'status_usuario' => (string) ''];
    }

    public function colocar_dados($dados){
        if(array_key_exists('id_usuario', $dados) == true){
            $this->id_usuario = (int) intval($dados['id_usuario'], 10);
        }else{
            $this->id_usuario = (int) 0;
        }

        if(array_key_exists('id_empresa', $dados) == true){
            $this->id_empresa = (int) intval($dados['id_empresa'], 10);
        }else{
            $this->id_empresa = (int) 0;
        }

        if(array_key_exists('nome_usuario', $dados) == true){
            $this->nome_usuario = (string) strtoupper($dados['nome_usuario']);
        }else{
            $this->nome_usuario = (string) '';
        }

        if(array_key_exists('login_usuario', $dados) == true){
            $this->login_usuario = (string) $dados['login_usuario'];
        }else{
            $this->login_usuario = (string) '';
        }

        if(array_key_exists('senha_usuario', $dados) == true){
            $this->senha_usuario = (string) password_hash($dados['senha_usuario'], PASSWORD_DEFAULT, $this->opcao);
        }else{
            $this->senha_usuario = (string) password_hash('', PASSWORD_DEFAULT, $this->opcao);
        }

        if(array_key_exists('tipo_usuario', $dados) == true){
            $this->tipo_usuario = (string) $dados['tipo_usuario'];
        }else{
            $this->tipo_usuario = (string) 'COMUM';
        }

        if(array_key_exists('status', $dados) == true){
            $this->status_usuario = (string) $dados['status'];
        }else{
            $this->status_usuario = (string) 'ATIVO';
        }

        if(array_key_exists('data_cadastro', $dados) == true){
            $this->data_cadastro = (string) $dados['data_cadastro'];
        }else{
            $this->data_cadastro = (string) '';
        }
    }

    public function salvar_dados($dados){
        $this->colocar_dados($dados);

        return (array) [];        
    }

    public function pesquisar_todos($dados){
        return (array) model_all((string) $this->tabela(), (array) $dados['filtro'], (array) $dados['ordenacao'], (int) intval($dados['limite'], 10));
    }

    public function pesquisar($dados){
        return (array) model_one((string) $this->tabela(), (array) $dados['filtro']);
    }

    public function deletar($dados){
        return (array) [];
    }
}
?>