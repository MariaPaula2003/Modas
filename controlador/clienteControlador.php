<?php

require_once 'servico/validacaoServico.php';
require_once 'modelo/clienteModelo.php';
require_once 'modelo/enderecoModelo.php';

function cadastro(){
    if (ehPost()){
       $nome = $_POST["nome"];
       $email = $_POST["email"];
       $senha = $_POST["senha"];
       $cpf = $_POST["cpf"];
       $sexo = $_POST ["sexo"];
       $dataNasc = $_POST ["dataNasc"];
       $tipousuario = $_POST ["tipousuario"];
 
       $erros = array();
       
       if (valida_nao_vazio($nome) != NULL){
          $erros[]= "Você deve inserir um valor no campo Nome";  
      }
      if (valida_nao_vazio($sexo) != NULL){
          $erros[]= "Você deve inserir um valor no campo Sexo";  
      }
        if (valida_nao_vazio($dataNasc) != NULL){
          $erros[]= "Você deve inserir um valor no campo Data de Nascimento";  
      }
     if (vali_email($email) != NULL){
         $erros[]= "Informe um email válido."; 
     }
     
     if(count($erros) > 0){
         $dados = array();
         $dados["erros"] = $erros;
         exibir("cliente/cadastro", $dados);
     }else{
         $mensagem = adicionarCadastro($nome,$cpf,$senha,$email,$sexo,$tipousuario,$dataNasc);
         redirecionar("cliente/listarClientes");
     }
      
   }else{
       exibir("cliente/cadastro");
   } 
}

function contato(){
    if (ehPost()){
        $nome = $_POST["nome"];
        $telefone = $_POST["tel"];
        $email = $_POST["email"];
        $mensagem = $_POST["mens"];
       
         if (valida_nao_vazio($nome) != NULL){
          $erros[]= "Você deve inserir um valor no campo Nome";  
      }
      if (valida_nao_vazio_tipoEs($tel) != NULL){
          $erros[]= "Informe um valor numérico valido no campo Telefone.";    
      }
        if (vali_email($email) != NULL){
         $erros[]= "Informe um email válido."; 
     }
    
    }  
}

function listarClientes(){
    $dados = array();
    $dados["clientes"] = pegarTodosClientes();
    exibir("cliente/listar", $dados);
}

function ver($cod_cliente){
    $dados["cliente"] = pegarUsuarioPorId($cod_cliente);
    $dados["enderecos"] = pegarEnderecosPorUsuario($cod_cliente);
    exibir("cliente/visualizar", $dados);
}

function deletar($cod_cliente){
    $msg = deletarCliente($cod_cliente);
    redirecionar("cliente/listarClientes");
}

function editar($cod_cliente){
     if (ehPost()){
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $senha = $_POST["senha"];
      $cpf = $_POST["cpf"];
      $sexo = $_POST ["sexo"];
      $dataNasc = $_POST ["dataNasc"];
      $tipousuario = $_POST ["tipousuario"];
       
       editarCliente($cod_cliente,$nome,$cpf,$senha,$email,$sexo,$tipousuario,$dataNasc);
       redirecionar("cliente/listarClientes");
} else{
    $dados["cliente"] =  pegarUsuarioPorId($cod_cliente);
    exibir("cliente/cadastro",$dados);
} 
}

function adicionar ($idusuario){
    if (ehPost()) {
         $logradouro = strip_tags($_POST["logradouro"]);
        $numero = strip_tags($_POST["numero"]);
        $complemento = strip_tags($_POST["complemento"]);
        $bairro = strip_tags($_POST["bairro"]);
        $cidade = strip_tags($_POST["cidade"]);
        $cep = strip_tags($_POST["cep"]);
    }
}