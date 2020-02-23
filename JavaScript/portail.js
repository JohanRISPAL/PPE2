$( document ).ready(function(){
    var user = $("#username"),
		pwd = $("#password");
        
	$(".errorGlobal").hide();
    $(".errorEmpty").hide();
    $(".banned").hide();

    $("#bouttonConnexion").click(function(event){

    		$.ajax({
    			data : {method : "getUser", user : user.val(), pass : pwd.val()},
    			type : "post",
    			url : "fonction.php",
    			success: function(response)
    			{
                    var exist = false;
                    var banned = false;
                    var reponse = JSON.parse(response);
                    console.log(reponse);

                    if (reponse == false)
                    {
                        exist = false;
                        banned = true;
                    }

                    else
                    {
                        exist = true;
                        banned = false;  
                    }

                    if (user.val() == "" || pwd.val() == "")
                    {
                        user.css({
                            borderColor : 'red',
                            color : 'red',
                        });
                        pwd.css({
                            borderColor : 'red',
                            color : 'red',
                        });

                        $(".banned").hide();
                        $(".errorEmpty").show();
                        $(".errorGlobal").hide();
                    }

                    else if (exist == true && banned == true)
                    {
                         user.css({
                            borderColor : 'red',
                            color : 'red',
                        });
                        pwd.css({
                            borderColor : 'red',
                            color : 'red',
                        });

                        $(".banned").show();
                        $(".errorGlobal").hide();
                        $(".errorEmpty").hide();
                    }

                    else if (exist == false)
                    {
                        user.css({
                            borderColor : 'red',
                            color : 'red',
                        });
                        pwd.css({
                            borderColor : 'red',
                            color : 'red',
                        });

                        $(".banned").hide();
                        $(".errorGlobal").show();
                        $(".errorEmpty").hide();
                    }

                    else if (exist == true && banned == false)
                    {
                        document.location.href="../php/AccueilConnecte.php";
                    }

    			}
		    });
            
	});    
});
