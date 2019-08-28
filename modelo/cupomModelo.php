<?php

function adicionarCupom($nome,$desconto){
    $comando = "INSERT INTO cupom (nome,desconto)"
            . "VALUES ('$nome','$desconto')";
    $resultado = mysqli_query($conexao = conn(), $comando);
    if(!$resultado){ die('Erro no cadastro!' . mysqli_error($conexao));}
    return 'Cadastrado com sucesso!';
}

function pegarTodosCupom(){
    $sql = "SELECT * FROM cupom";
    $resultado = mysqli_query(conn(),$sql);
    $cupons = array();
    while ($linha = mysqli_fetch_assoc($resultado)){
        $cupons[] = $linha;
    }
   return $cupons; 
}

function pegarCupomPorId($id_cupom){
    $sql = "SELECT * FROM cupom WHERE id_cupom = $id_cupom";
    
    $resultado = mysqli_query(conn(), $sql);
    
    $cupom = mysqli_fetch_assoc($resultado);
    
    return $cupom;
}

function deletarCupom($id_cupom){
    $sql = "DELETE FROM cupom WHERE id_cupom = $id_cupom";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!resultado){
     die('Erro ao deletar cupom' . mysqli_error($cnx));   
    }
    return 'cupom deletado com sucesso!';
}
function editarCupom($nome,$desconto,$id_cupom){
    $sql = "UPDATE cupom SET nome = '$nome'  WHERE id_cupom = $id_cupom";
    $resultado = mysqli_query($conexao = conn(), $sql);
     if(!$resultado){ die('Erro ao editar cupom!' . mysqli_error($conexao)); }
    return 'Cupom alterada com sucesso!';
}
