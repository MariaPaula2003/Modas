<h2>Listar Cupons</h2>
        
   <table class="table">
            <thead>
                <tr>
                    <th>Id_cupom</th>
                    <th>Nome</th>
                    <th>Ver Cupom</th>
                    <th>Deletar</th>
                    <th>Editar</th>
                </tr>
            </thead>
        <?php foreach ($cupons as $cupom): ?> 
            <tr>
                <td><?=$cupom['cupom']?></td>
                <td><?=$cupom['nome']?></td>
                <td><a href="./cupom/ver/<?=$cupom['cupom']?>">Ver</a></td>
                <td><a href="./cupom/deletar/<?=$cupom['cupom']?>">Deletar</a></td>
                 <td><a href="./cupom/editar/<?=$cupom['cupom']?>">Editar</a></td>
            </tr>
        <?php endforeach; ?>
   </table> 
        <br>
        <a href="./cupom/adicionar" class="btn btn-primary">Novo Cupom</a>
        
        <br><br>