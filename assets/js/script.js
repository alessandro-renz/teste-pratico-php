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

function carregaMarcas(){
	$.getJSON("home/getMarcas", function(res){
		for(i=0;i<res.length;i++)
		{
			var marca = res[i].fornecedor.replace("_", " ");
			var html = "<option value="+res[i].fornecedor+">"+marca+"</option>";
			$("#marca").append(html);
		}
	});

}
function loadPage()
{
	getQT();
	verificaSessao();
	carregaMarcas();
}

$("#search").keyup(function(){
	var txt = $(this).val();
	$("#body_busca").html('');

	$.ajax({
		type:"POST",
		url:"home/getItem",
		dataType:'json',
		data:{txt:txt},
		success:function(res){
			if(txt.length >1){
				$("#cards").attr('style', "display: none");
				$("#busca").attr('style', "display: block");
				
				for(i=0;i<res.length;i++){
					var html = "<i class='fas fa-search mt-2' style='font-size: 20px;'></i>"+
					"<a href='#' id='link-busca' class='text-link pl-2' style='font-size: 20px;'>"+res[i].nome+"</a><br>";	
					$("#body_busca").append(html);
				}
			}

			if(txt.length <= 0){
				$("#cards").attr('style', "display: block");
				$("#busca").attr('style', "display: none");
				$("#body_busca").html('');
			}


		}
	});
});

function carregaCep(){
	
	var cep = $("#cep").val();
	$("#cidade").attr("placeholder", "carregando...");
	$("#estado").attr("placeholder", "carregando...");
	if(cep.length == 8){
		$.ajax({
			type:"POST",
			url:"home/getEndereco",
			dataType:"json",
			data:{cep:cep},
			success:function(j){
				$("#cidade").val(j.localidade);
				$("#estado").val(j.uf);
				$("#cep").css("border", "2px solid green");
				$("#cidade").css("border", "2px solid green");
				$("#estado").css("border", "2px solid green");
			},
			error:function(){
				$("#cep").css("border", "2px solid red");
				$("#cidade").css("border", "2px solid red");
				$("#estado").css("border", "2px solid red");
				$("#cidade").attr("placeholder", "CEP não existe!");
				$("#estado").attr("placeholder", "CEP não existe!");
			}
		});
	}else{
		$("#cidade").val("");
		$("#estado").val("");
	}
	
}

