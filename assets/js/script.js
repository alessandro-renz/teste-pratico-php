$(function(){
	$("#user").hover(function(){
		$(this).css('cursor', "pointer");
	});
	$("#buy").hover(function(){
		$(this).css('cursor', "pointer");
	});
	$("#newuser").hover(function(){
		$(this).css('cursor', "pointer");
	});
	
	$("#user").click(function(){
		$("#login").modal('show');
	});
	$("#newuser").click(function(){
		$("#cadastro").modal('show');
	});

	$("#btn_cadastro").click(function(){
		$("#login").modal("hide");
		$("#cadastro").modal("show");
	});

	$("#btn_sair").click(function(){
		$("#user").attr("style", "display: block");
		$("#newuser").attr("style", "display: block");
		$("#drop").attr("style", "display: none");
	});
});

function addCarrinho(id)
{
	$.getJSON("home/getProdsByAjax/"+id, function(res){
		$.ajax({
			url:"home/insertProdsByAjax",
			type:'POST',
			dataType:"JSON",
			data:{id:res.id, nome:res.nome, preco:res.preco, url:res.url}

		});
		getQT();
	});

}
function getQT()
{
	$.getJSON("home/getQtProds", function(res){
		var qt = res.length;
		$("#qt_prods").html(qt);
	});
}


function verificaSessao(){
	$.getJSON("home/verificaSessao", function(res){
		if(res.response === true){
			$.getJSON("home/getUserById/"+res.id, function(response){
				$("#user").attr("style", "display: none");
				$("#newuser").attr("style", "display: none");
				$("#drop").attr("style", "display: block");
				$("#nome_drop").html("<h7>"+response.nome+"</h7>");
				$("#login").modal("hide");
			});

		}
	});
	
}
function logar(){
	$("#form_login").bind("submit", function(e){
		e.preventDefault();
		var form = $(this).serialize();
		
		$.ajax({
			url:"home/checkUser",
			type:'POST',
			dataType:"JSON",
			data:form
		});
	});

	verificaSessao();
}
function cadastrar(){
	$("#form_cadastro").bind("submit", function(e){
		e.preventDefault();
		var senha1 = $("#senha1").val();
		var senha2 = $("#senha2").val();
		
		if(senha1 == senha2){
			var form = $(this).serialize();
			
			$.ajax({
				url:"home/insertUser",
				type:'POST',
				dataType:"JSON",
				data:form,
				success:function(res){
					$("#cadastro").modal("hide");
				}
			});	
		}
		
	});
}

$("#buy").click(function(){
	$.getJSON("home/getPurchase", function(res){
		for(i=0;i<res.length;i++)
		{
			var linha = "<tr>"+
						"<td>"+res[i].nome+"</td>"+
						"<td>"+res[i].qt+"</td>"+
						"<td>"+res[i].preco+"</td>"
					+"</tr>";
			$("#body_table").append(linha);
		}
	});
	$("#modal_carrinho").modal("show");
});

function limparCarrinho()
{
	$.ajax({
		type:"POST",
		url:"home/clearPurchase"
	});

	$("#modal_carrinho").modal("hide");
	window.location.href=window.location.href;
}

function loadPage()
{
	getQT();
	verificaSessao();
}

$("#search").keyup(function(){
	var txt = $(this).val();
	
	$.ajax({
		type:"POST",
		url:"home/getItem",
		dataType:'json',
		data:{txt:txt},
		success:function(res){
			if(txt.length >2){
				$("#cards").attr('style', "display: none");
				$("#busca").attr('style', "display: block");
				
				for(i=0;i<res.length;i++){
					var html = "<i class='fas fa-search mt-2' style='font-size: 20px;'></i>"+
					"<a href='#' class='text-link' style='font-size: 20px;'>"+res[i].nome+"</a><br>";	
					$("#body_busca").append(html);
				}
			}

			if(txt.length <= 0){
				$("#cards").attr('style', "display: block");
				$("#busca").attr('style', "display: none");
			}


		}
	});
});
$("#btn-search").click(function(){
	var txt = $("#search").val();
	$("#form-search").bind("submit", function(e){
		e.preventDefault();
		$("#campoSearch").html("<i>Você pesquisou por: <strong>"+txt+"</strong><i>");	
	});
});

function getCard(title,url,nome,id, preco){
	var html = "<div class='card mt-2' id='produto'>"+
				"<div class='card-body'>"+
					"<div class='card-title'><h5>"+title+"</h5></div>"+
					"<hr id='linhaProduto'>"+
					"<div class='clearfix'>"+
						"<div class='float-left'>"+
							"<img src='assets/"+url+"' style='height: 150px;width: 150px;'>"
						+"</div>"+
						"<div class='float-left ml-5'>"+
							"<h4>"+nome+"</h4>"+
							"<h5>"+preco+"</h5>"
						+"</div>"+
						"<div class='float-right mt-4'>"+
							"<button onclick='addCarrinho("+id+")' class='btn btn-success'><i class='fas fa-plus mr-2'></i>Adicionar no carrinho</button>"
						+"</div>"
					+"</div>"
				+"</div>"
			+"</div>";
	return html;	
}