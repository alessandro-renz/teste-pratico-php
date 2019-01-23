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
});

function addCarrinho(id)
{
	$.getJSON("home/getProdsByAjax/"+id, function(res){
		$.ajax({
			url:"home/insertProdsByAjax",
			type:'POST',
			dataType:"JSON",
			data:{id:res.id, nome:res.nome, preco:res.preco, url:res.url},
			success:function(res){
				var qt = res.length;
				$("#qt_prods").html(qt);
			}
		});
	});
}
function getQT()
{
	$.getJSON("home/getQtProds/", function(res){
		var qt = res.length;
		$("#qt_prods").html(qt);
	});
}
getQT();

function logar(){
	$("#form_login").bind("submit", function(e){
		e.preventDefault();
		var form = $(this).serialize();
		
		$.ajax({
			url:"home/checkUser",
			type:'POST',
			dataType:"JSON",
			data:form,
			success:function(res){
				console.log(form);
			}
		});
	});
	
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
					console.log(form);
				}
			});	
		}
		
	});
	
}