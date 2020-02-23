$(document).ready(function(){
	var message = $('#post'),
		titre = $('#titre');
		

		$(".errorEmptyPost").hide();
   		$(".errorEmptyTitle").hide();
    	$(".errorEmpty").hide();


		$("#envoie").click(function()
		{
			if (message.val() == "")
			{
				message.css({
	        		borderColor : 'red',
	        		color : 'red',
	        	});
	        	titre.css({
	        		borderColor : 'initial',
	        		color : 'initial',
	        	});
    			$(".errorEmptyPost").show();
		   		$(".errorEmptyTitle").hide();
		    	$(".errorEmpty").hide();
			}

			else if (titre.val() == "")
			{
				message.css({
	        		borderColor : 'initial',
	        		color : 'initial',
	        	});
	        	titre.css({
	        		borderColor : 'red',
	        		color : 'red',
	        	});
    			$(".errorEmptyPost").hide();
		   		$(".errorEmptyTitle").show();
		    	$(".errorEmpty").hide();
			}

			else if (message.val() == "" && titre.val() == "")
			{
				message.css({
	        		borderColor : 'red',
	        		color : 'red',
	        	});
				titre.css({
	        		borderColor : 'red',
	        		color : 'red',
	        	});
    			$(".errorEmptyPost").hide();
		   		$(".errorEmptyTitle").hide();
		    	$(".errorEmpty").show();
			}

			else if (!(message.val() == "" && titre.val() == ""))
			{
				$( "#creation" ).trigger( "submit" );
			}
		});
});

		