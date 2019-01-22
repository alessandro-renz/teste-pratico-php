$(function(){
	$("#produto").hover(function(){
		$(this).attr("class", "card border-warning");
		$("#linhaProduto").attr("class", "bg-warning");
	}, 
	function(){
		$(this).attr("class", "card");
		$("#linhaProduto").attr("class", "");
	});
});