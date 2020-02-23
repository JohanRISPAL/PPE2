$(document).ready(function(){
    var pseudo = $('#pseudo'),
        password = $('#password'),
        confirmation = $('#confirm'),
        i = 0,
        tab = [],
        exist = false;

    $(".errorMdp").hide();
    $(".errorEmpty").hide();
    $(".existId").hide();

    $("#bouttonInscription").click(function(){

    		$.ajax({
    			data : {method : "userExist", pseudo : pseudo.val()},
    			type : "post",
    			url : "fonction.php",
    			success: function(response)
    			{
    				response = JSON.parse(response);
    				
    				if (response == false)
    				{
    					exist = false;
    				}

    				else 
    				{
    					exist = true;
    				}

    				if (pseudo.val() == "" || password.val() == "" || confirmation.val() == "")
		    		{
		    			pseudo.css({
			        		borderColor : 'red',
			        		color : 'red',
			        	});
			        	password.css({
			        		borderColor : 'red',
			        		color : 'red',
			        	});
			            confirmation.css({ 
			     	        borderColor : 'red',
			        		color : 'red',
			            });
		    			$(".errorEmpty").show();
		    			$(".errorMdp").hide();
		    			$(".existId").hide();
		    		}  


			        else if(confirmation.val() != password.val()){ 
			        	pseudo.css({
			        		borderColor : "initial",
			        		color : 'initial',
			        	});
			        	password.css({
			        		borderColor : 'red',
			        		color : 'red',
			        	});
			            confirmation.css({ 
			     	        borderColor : 'red',
			        		color : 'red',
			            });

			            $(".errorMdp").show();
			            $(".errorEmpty").hide();
			            $(".existId").hide(); 
			        }

    				else if (exist == true)
	        		{
			        	pseudo.css({
			        		borderColor : 'red',
			        		color : 'red',
			        	});
			        	password.css({
			        		borderColor : 'green',
			        		color : 'green',
			        	});
			            confirmation.css({ 
			     	        borderColor : 'green',
			        		color : 'green',
			            });
			        	$(".existId").show();
			        	$(".errorMdp").hide();
			        	$(".errorEmpty").hide();
			        }

			        else if (exist == false && confirmation.val() == password.val())
			        {
			        	$( "#inscription" ).trigger( "submit" );
			        }
		    	}
		    });

    		


	});    
    
});