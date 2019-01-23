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
getQT();

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