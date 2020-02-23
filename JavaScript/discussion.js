$(".buttonTheme").on("click", function(event) 
{
	var id = $(this).attr("id").substring(9);

	$.ajax(
	{
		data : {id : id, getTheme : 1},
		type : "post",
		url : "filtreDiscussion.php",
		success: function(response)
		{
			var tab = JSON.parse(response);
			console.log(tab);
			$("#discussions").empty();

			if (tab.length == 0)
			{
				var divVide = document.createElement('div');
				$(divVide).addClass("empty");

				var messageVide = document.createElement('p');
				$(messageVide).addClass("messageEmpty");

				$(messageVide).html("Il n'y as pas de post ici, appuie sur un autre theme");
				messageVide.append(divVide);
			}

			else
			{
				for (var i = 0; i < tab.length; i++)
				{
					var divPost = document.createElement('div');
					$(divPost).addClass("post");

					var titre = document.createElement('p');
					$(titre).addClass("titre");
					$(titre).html(tab[i]["Titre"]);

					var contenu = document.createElement('p');
					$(contenu).addClass("contenu");
					$(contenu).html(tab[i]["Contenu"]);

					var pseudo = document.createElement('p');
					$(pseudo).addClass("pseudoCreateur");
					$(pseudo).html("Ecrit par " +tab[i]["login"]);

   					var date = document.createElement('p');
					$(date).addClass("date");
					$(date).html(tab[i]["DatePublication"]);

					var urlRep = "../php/repondre.php?idPost=" +tab[i]["idPosts"];
					var btnRep = document.createElement("a");
					$(btnRep).attr("href", urlRep);
					$(btnRep).html("repondre");

					divPost.append(titre);
					divPost.append(contenu);
					divPost.append(pseudo);
					divPost.append(date);
					divPost.append(btnRep);
					$("#discussions").append(divPost);
				}
			}
		}
	});
});