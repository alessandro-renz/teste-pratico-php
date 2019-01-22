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
	$.getJSON("/HomeController/getProdsByAjax")
}