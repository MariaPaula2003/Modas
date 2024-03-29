<?php

require_once 'servico/validacaoServico.php';
require_once 'modelo/enderecoModelo.php';
require_once 'modelo/clienteModelo.php';

function adicionar($idusuario){
    if (ehPost()){
        $logradouro = strip_tags($_POST["logradouro"]);
        $numero = strip_tags($_POST["numero"]);
        $complemento = strip_tags($_POST["complemento"]);
        $bairro = strip_tags($_POST["bairro"]);
        $cidade = strip_tags($_POST["cidade"]);
        $cep = strip_tags($_POST["cep"]);
        
        $erros = array();
        
if (valida_nao_vazio($logradouro) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     if (valida_nao_vazio($numero) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     if (valida_nao_vazio($complemento) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     if (valida_nao_vazio($bairro) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     
     if (valida_nao_vazio($cidade) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     if (valida_nao_vazio($cep) != NULL){
         $erros[]= "Voce deve inserir um valor!."; 
     }
     
if(count($erros) > 0){
         $dados = array();
         $dados["erros"] = $erros;
         exibir("endereco/formulario", $dados);
     }else{
         $mensagem = adicionarEndereco($idusuario,$logradouro,$numero,$complemento, $bairro,$cidade,$cep);
         echo $msg;
        redirecionar("cliente/ver/$idusuario");
     }
    }else{
        $dados["endereco"] = pegarEnderecoPorId($idusuario);
        exibir("endereco/formulario", $dados);  
     }    
}

function listarEnderecos(){
    $dados = array();
    $dados["enderecos"] = pegarEnderecosPorUsuario($cod_cliente);
    exibir("endereco/listar", $dados);
}

function ver($idEndereco){
    $dados["endereco"] = pegarEnderecoPorId($idEndereco);
    exibir("endereco/visualizar", $dados);
}

function deletar($idEndereco){
    $msg = deletarEndereco($idEndereco);
    redirecionar("endereco/listarEnderecos");
}
function editar($idEndereco){
     if (ehPost()){
      $logradouro = $_POST["logradouro"];
      $numero = $_POST["numero"];
      $complemento = $_POST["complemento"];
      $bairro = $_POST["bairro"];
      $cidade = $_POST["cidade"];
      $cep = $_POST["cep"];
        
      editarEndereco($idEndereco,$logradouro,$numero,$complemento, $bairro,$cidade,$cep);
      redirecionar("endereco/listarEnderecos");
} else{
    $dados["endereco"] = pegarEnderecoPorId($idEndereco);
    exibir("endereco/formulario", $dados);
} 
}
