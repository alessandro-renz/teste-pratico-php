$(function(){
	$("#produto").hover(function(){
		$(this).attr("class", "card border-warning");
		$("#linhaProduto").attr("class", "bg-warning");
	}, 
	function(){
		$(this).attr("class", "card");
		$("#linhaProduto").attr("class", "");
	});

	$("#user").hover(function(){
		$(this).css('cursor', "pointer");
	});
	$("#buy").hover(function(){
		$(this).css('cursor', "pointer");
	});
	$("#user").click(function(){
		$("#login").modal('show');
	});
});