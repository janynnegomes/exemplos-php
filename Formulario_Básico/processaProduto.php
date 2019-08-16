<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Cadastro de Produtos</title>
        <!-- Bootstrap CSS - Biblioteca de estilos para o projeto -->
        <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-6">
                    <h1>Cadastro de Produtos</h1>
                    <form action="processaProduto.php" 
                          method="post" 
                          class="mt-5">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" id="Produto" 
                                   name="Produto" 
                                   required 
                                   class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Preço</label>
                            <input type="number" class="form-control" 
                                   required  
                                   id="Preco" name="Preco"  
                                   min="0" 
                                   value="0" 
                                   step="0.01">                            
                        </div>

                        <div class="form-group">
                            <input type="submit" 
                                   id="btnEnviar" 
                                   class="btn btn-success" 
                                   value="Adicionar"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <?php
                    include './Produto.php';

                    // verifica se há informação de produto vinda do formulário
                    if (isset($_POST["Produto"])) {

                        $produtoForm = new Produto();

                        $produtoForm->Produto = $_POST["Produto"];
                        $produtoForm->Preco = $_POST["Preco"];

                        echo "<h1>Dados do Produto</h1>";
                        echo '<ul>';
                        echo "<li>Produto: $produtoForm->Produto</li>";
                        echo "<li>Preço:" . $produtoForm->exibeReal($produtoForm->Preco) . "</li>";
                        echo '</ul>';

                        echo '<h1>Aumentar em 10%</h1>';
                        $produtoForm->aumentarPreco(0.1);

                        echo '<h3>';
                        echo $produtoForm->exibePrecoReajustado();
                        echo '</h3>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
