<?php
require_once 'Classes/bancoDeDados.php';
require_once 'Classes/validar_CPF_CNPJ/validar_cpf_cnpj.php';

class Empresa implements Template{
    private $id_empresa;
    private $nome_empresa;
    private $cnpj_empresa;
    private $data_cadastro;
    private $data_alteracao;
    
    public function tabela(){
        return (string) 'empresa';
    }

    public function modelo(){
        return (array) ['id_empresa' => (int) 0, 'nome_empresa' => (string) '', 'cnpj_empresa' => (string) '', 'data_cadastro' => 'date', 'data_alteracao' => 'date'];
    }

    public function colocar_dados($dados){  
        if(array_key_exists('id_empresa', $dados) == true){
            $this->id_empresa = (int) intval($dados['id_empresa'], 10);
        }else{
            $this->id_empresa = (int) intval(0, 10);
        }

        if(array_key_exists('nome_empresa', $dados) == true){
            $this->nome_empresa = (string) strtoupper($dados['nome_empresa']);
        }else{
            $this->nome_empresa;
        }

        if(array_key_exists('cnpj_empresa', $dados) == true){
            $this->cnpj_empresa = (string) $dados['cnpj_empresa'];
        }else{
            $this->cnpj_empresa = (string) '';
        }

        if(array_key_exists('data_cadastro', $dados) == true){
            $this->data_cadastro = (string) $dados['data_cadastro'];
        }else{
            $this->data_cadastro = (string) '';
        }

        if(array_key_exists('data_alteracao', $dados) == true){
            $this->data_alteracao = (string) $dados['data_alteracao'];
        }else{
            $this->data_alteracao = (string) '';
        }
    }

    public function salvar_dados($dados){
        $this->colocar_dados($dados);

        $validar_cnpj = new ValidarCpfCnpj();

        $retorno_validacao_cnpj = (bool) $validar_cnpj->valida((string) $this->cnpj_empresa);

        if($retorno_validacao_cnpj == true){
            $retorno_checagem = (bool) model_check((string) $this->tabela(), (array) ['cnpj_empresa', '===', (string) $this->cnpj_empresa]);

            if($retorno_checagem == false){
                $retorno_cadastro = (bool) model_insert((string) $this->tabela(), (array) model_parse((array) $this->modelo(), (array) ['id_empresa' => (int) intval(model_next((string) $this->tabela(), (string)'id_empresa'), 10), 'nome_empresa' => (string) $this->nome_empresa, 'cnpj_empresa' => (string) $this->cnpj_empresa, 'data_cadastro' => model_date($this->data_cadastro), 'data_alteracao' => model_date($this->data_alteracao)]));

                if($retorno_cadastro == true){
                    return (array) ['titulo' => (string) 'Sucesso na Operação', 'icone' => (string) 'success', 'mensagem' => (string) 'Empresa cadastrada com sucesso!'];
                }else{
                    return (array) ['titulo' => (string) 'Erro durante a Operação', 'icone' => (string) 'error', 'mensagem' => (string) 'Falha durante o processo de cadastro'];
                }
            }else{
                $retorno_alteracao = (bool) model_update((string) $this->tabela(), (array) ['id_empresa', '===', (int) intval($this->id_empresa, 10)], (array) model_parse((array) $this->modelo(), (array) ['id_empresa' => (int) intval($this->id_empresa, 10), 'nome_empresa' => (string) $this->nome_empresa, 'cnpj_empresa' => (string) $this->cnpj_empresa, 'data_cadastro' => model_date($this->data_cadastro), 'data_alteracao' => model_date($this->data_alteracao)]));

                if($retorno_alteracao == true){
                    return (array) ['icone' => (string) 'success', 'titulo' => (string) 'Empresa alterada com sucesso!', 'mensgem' => (string) 'Sucesso na operação de alterar os dados da empresa'];
                }else{
                    return (array) ['icone' => (string) 'error', 'titulo' => (string) 'Erro no processo de alteração', 'mensagem' => (string) 'Erro durante o processo de alteração dos dados da empresa'];
                }
            }
        }else{
            return (array) ['titulo' => (string) 'CNPJ INVÁLIDO', 'icone' => (string) 'error', 'mensagem' => (string) 'CNPJ informado é inválido!'];
        }
    }

    public function pesquisar($dados){
        return (array) model_one((string) $this->tabela(), (array) $dados['filtro']);
    }

    public function pesquisar_todos($dados){
        return (array) model_all((string) $this->tabela(), (array) $dados['filtro'], (array) $dados['ordenacao'], (int) intval($dados['limite'], 10));
    }

    public function deletar($dados){
        $retorno_operacao = (bool) model_delete((string) $this->tabela(), $dados['filtro']);
        
        if($retorno_operacao == true){
            return (array) ['mensagem' => (string) 'Empresa excluída com sucesso!', 'titulo' => (string) 'Sucesso na exclusão', 'icone' => (string) 'success'];
        }else{
            return (array) ['mensagem' => (string) 'Erro durante o processo de exclusão da empresa', 'titulo' => (string) 'Erro durante o processo', 'icone' => (string) 'error'];
        }
    }
}
?>