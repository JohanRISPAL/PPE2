$("#btnRepondre").click(function(event){
	var idPost = $(".reponse").attr('id');
	var contenu = $('.reponse').val();
	var idTheme = $('#idTheme').val();

	$.ajax({
		data:{method : "insertResponse", contenu : contenu, idPost : idPost, idTheme : idTheme},
		type : "post",
		url : "fonction.php",
		success:function(response)
		{
			
		}
	});
});