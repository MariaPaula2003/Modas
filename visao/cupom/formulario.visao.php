<form action="" method="POST">
            <h2>Cadastrar Cupom</h2>
        
        Nome: <input type="text" name="nome" value="<?=@$cupom['nome']?>"><br><br>
        Desconto: <input type="text" name="nome" value="<?=@$cupom['desconto']?>"><br><br>
        <?php
            if(ehPost()){
                foreach($erros as $erro){
                    echo "$erro<br>";
                }
            }
        ?>
        
        <br>
        
        <button>Cadastrar</button>
        
        
        </form>