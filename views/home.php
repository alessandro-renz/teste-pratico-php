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
            <img src="<?=URL?>assets/images/onehost.jpg" height="80px">
          </a>
          <form class="form-inline">
            <input class="form-control mr-sm-5" type="search" placeholder="O que você procura..." aria-label="Search" style="width: 400px;">
          </form>
          <div class="clearfix">
            <a href="#" class="float-left mr-4">
              <i class='fas fa-shopping-cart' style="font-size: 30px;"></i>
              <span class="badge badge-success"></span>
            </a>
            <a href="#" class="float-left mr-2">
              <i class='fas fa-user mr-1' style="font-size: 30px;"></i>
            </a>
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
                <select name="" id="nome" class="form-control">
                  <option value=""></option>
                  <option value="1">Crescente</option>
                  <option value="2">Decrescente</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nome">Preço:</label>
                <select name="" id="nome" class="form-control">
                  <option value=""></option>
                  <option value="1">Mais barato</option>
                  <option value="2">Mais caro</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-sm-9">
        <h4>Produtos</h4>
        <hr>
        <div class="card" id="produto">
          <div class="card-body">
            <div class="card-title">
              <h5>Categoria</h5>
              <hr id="linhaProduto">
              <div class="clear-fix">
                <div class="float-left">
                  <img src="<?=URL?>assets/images/onehost.jpg" >
                </div>
                <div class="float-left ml-5">
                  <h4>Nome Do produto</h4>
                  <h5>R$1000,00</h5>
                </div>
                <div class="float-right mt-4">
                    <button class="btn btn-success"><i class="fas fa-plus mr-2"></i>Adicionar no carrinho</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  
	</div>

	<script type="text/javascript" src="<?=URL?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?=URL?>assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="<?=URL?>assets/js/script.js"></script>
</body>
</html>