<?php


function adicionarEndereco($logradouro,$numero,$complemento, $bairro,$cidade,$cep){
    $comando = "INSERT INTO categoria (logradouro,numero,complemento, bairro,cidade,cep)"
            . "VALUES ('$logradouro','$numero','$complemento', '$bairro','$cidade','$cep')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodasEnderecos(){
    $sql = "SELECT * FROM endereco";
    $resultado = mysqli_query(conn(),$sql);
    $enderecos[] = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $enderecos[] = $linha;
    }
   return $enderecos; 
}
function pegarEnderecoPorId($cod_endereco){
    $sql = "SELECT * FROM endereco WHERE cod_endereco = $cod_endereco";
    
    $resultado = mysqli_query(conn(), $sql);
    
    $endereco = mysqli_fetch_assoc($resultado);
    
    return $endereco;
}

function deletarEndereco($cod_endereco){
    $sql = "DELETE FROM endereco WHERE cod_endereco = $cod_endereco";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!resultado){
     die('Erro ao deletar endereco' . mysqli_error($cnx));   
    }
    return 'Endereco deletado com sucesso!';
}
function editarEndereco($idEndereco,$logradouro,$numero,$complemento, $bairro,$cidade,$cep){
    $sql = "UPDATE endereco SET logradouro = '$logradouro',numero ='$numero',complemento='$complemento',bairro= '$bairro',cidade='$cidade',cep='$cep'  WHERE idEndereco = $idEndereco";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar endereco!' . mysqli_error($conexao)); }
    return 'Endereco alterado com sucesso!';
}