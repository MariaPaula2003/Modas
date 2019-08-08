<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
          <h2>Listar Categorias</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>IdEndereco</th>
                    <th>Ver Endereço</th>
                    <th>Deletar</th>
                    <td>Editar</td>
                </tr>
            </thead>
        <?php foreach ($enderecos as $endereco): ?> 
            <tr>
                <td><?=$categoria['idEndereco']?></td>
                <td><a href="./endereco/ver/<?=$categoria['idEndereco']?>">Ver</a></td>
                <td><a href="./endereco/deletar/<?=$categoria['idEndereco']?>">Deletar</a></td>
                <td><a href="./endereco/editar/<?=$categoria['idEndereco']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./categoria/adicionarCategoria" class="btn btn-primary">Nova Categoria</a>
    </body>
</html>


