<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Projeto</title>
    <link rel="stylesheet" href="<?=URL?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
   
  <div class="container">
  	<div class="row">
      <div class="col-12">
        <nav class="navbar navbar-light bg-light">
          <a class="navbar-brand">
            <img src="<?=URL?>assets/images/onehost.jpg" style="height: 100px;">
          </a>
          <form class="form-inline">
            <input class="form-control mr-sm-5" type="search" placeholder="O que você procura..." aria-label="Search" style="width: 400px;">
          </form>
          <div class="clearfix">
            <i id="buy" class='fas fa-shopping-cart mr-4 text-secondary' style="font-size: 30px;"><span style="font-size: 15px;" class="badge badge-pill badge-success" id="qt_prods"></span></i>
            
            <i id="user" class='fas fa-user mr-4 text-secondary' style="font-size: 30px;"></i>
            <i id="newuser" class='fas fa-user-plus mr-2 text-success' style="font-size: 30px;"></i>
          </div>
        </nav>
      </div>
    </div>  

    <div class="row mt-3">
      <div class="col-sm-3">
        <div class="card border-primary">
          <h5 class="text-center pt-3">Filtros</h5>
          <hr class="bg-primary">
          <div class="card-body">
            <form action="" method="POST">
              <div class="form-group">
                <label for="nome">Nome:</label>
                <select name="" id="nome_prod" class="form-control">
                  <option value=""></option>
                  <option value="1">Crescente</option>
                  <option value="2">Decrescente</option>
                </select>
              </div>
              <div class="form-group">
                <label for="preco">Preço:</label>
                <select name="" id="preco" class="form-control">
                  <option value=""></option>
                  <option value="1">Mais barato</option>
                  <option value="2">Mais caro</option>
                </select>
              </div>
              <div class="form-group">
                <label for="marca">Marca:</label>
                <select name="" id="marca" class="form-control">
                  <option value=""></option>
                </select>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-9">
        <h4>Produtos</h4>
        <hr>
        <?php foreach($produtos as $p): ?>
        
        <div class="card mt-2" id="produto">
          <div class="card-body">
            <div class="card-title">
              <h5><?=ucwords($p['fornecedor'])?></h5>
              <hr id="linhaProduto">
              <div class="clear-fix">
                <div class="float-left">
                  <img src="<?=URL?>assets/<?=$p['url']?>" style="height: 150px;width: 150px;">
                </div>
                <div class="float-left ml-5">
                  <h4><?=ucwords($p['nome'])?></h4>
                  <h5>R$<?=str_replace(".", ",", $p['preco'])?></h5>
                </div>
                <div class="float-right mt-4">
                    <button onclick="addCarrinho(<?=$p['id']?>)" class="btn btn-success"><i class="fas fa-plus mr-2"></i>Adicionar no carrinho</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div> 
  
	</div>

	<script type="text/javascript" src="<?=URL?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?=URL?>assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?=URL?>assets/js/script.js"></script>
</body>
</html>

<!-- Modal de login!-->
<div class="modal fade" id="login">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h4><strong>Login</strong></h4>
            <button type="close" class="close" data-dismiss="modal"><span style="color: red;">&times;</span></button>    
        </div>
        <div class="modal-body">
            <form method="POST" id="form_login">
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Digite o email...">
              </div>
              <div class="form-group">
                <label for="senha">Senha:</label>
                <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a senha...">
              </div>
              <button onclick="logar()" class="btn btn-primary"><i class="fas fa-sign-in-alt mr-2"></i>Entrar</button>
            </form>

        </div>
      </div>
    </div>
</div>


<!-- Modal de cadastro!-->
<div class="modal fade" id="cadastro">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h4><strong>Cadastro</strong></h4>
            <button type="close" class="close" data-dismiss="modal"><span style="color: red;">&times;</span></button>    
        </div>
        <div class="modal-body">
            <form action="" method="POST">
              
              <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control" type="nome" id="nome_cadastro" placeholder="Digite o nome...">
              </div>

              <div class="form-group">
                <label for="email">E-mail:</label>
                <input class="form-control" type="email" id="email_cadastro" placeholder="Digite o email...">
              </div>

              <div class="form-row">
                <div class="col">
                  <label for="senha">Senha:</label>
                  <input class="form-control" type="senha" id="senha_cadastro" placeholder="Digite a senha...">
                </div>
                <div class="col">
                  <label for="senha2">Confirme a senha:</label>
                  <input class="form-control" type="senha2" id="senha2_cadastro" placeholder="Digite a senha novamente...">
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <label for="cep">CEP:</label>
                  <input class="form-control" type="cep" id="cep_cadastro" placeholder="Digite o cep...">
                </div>
                <div class="col">
                  <label for="cidade">Cidade:</label>
                  <input class="form-control" type="cidade" id="cidade_cadastro" placeholder="Digite a cidade...">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="estado">Estado:</label>
                  <input class="form-control" type="estado" id="estado_cadastro" placeholder="Digite o estado...">
                </div>
                <div class="col">
                  <label for="bairro">Bairro:</label>
                  <input class="form-control" type="bairro" id="bairro_cadastro" placeholder="Digite a cidade...">
                </div>
              </div>
              <div class="form-row">
                <div class="col">
                  <label for="rua">Rua:</label>
                  <input class="form-control" type="rua" id="rua_cadastro" placeholder="Digite o nome da rua...">
                </div>
                <div class="col">
                  <label for="numero">Numero:</label>
                  <input class="form-control" type="numero" id="numero_cadastro" placeholder="Digite o numero da casa...">
                </div>
              </div>
              
              <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus mr-2"></i>Cadastrar</button>
            </form>  
        </div>
      </div>
    </div>
</div>