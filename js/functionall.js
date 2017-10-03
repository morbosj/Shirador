$(document).ready(function(){
	function passwordAdmin(){
		var password = prompt("Enter a Password: ");
		if(password == "admin"){
			window.alert("Password is correct");
		}else{
			location.reload();
			window.alert("Wrong Password");
		}
	}	


	$("#Goto").change(function() {
		var target = $("#Goto option:selected").val();
		if(target == "Operator"){
	      $("#Goto option[value='Operator']").attr("selected","selected");
	      $("#Operator").animate({marginTop:"120px", marginLeft: "500px"}).fadeToggle();
	      $("header").fadeOut();
	      $("#Administrator").fadeOut();
	    }else if (target == "Administrator") {
	    		passwordAdmin();
	      		$("Goto option[value='Administrator']").attr("selected","selected");
	      		$("#Administrator").fadeToggle(); 
	      		$("#Administrator	").animate({marginLeft: "550px"});
	      		$("#user-role").animate({opacity: "0.5"});  		
	    }else{
	    	alert('Please select what you are.');
	    }
  });

	$("#reg").click(function(){
			$("#Register").animate({marginLeft: "420px", marginTop: "20px"}).fadeToggle();
			$("#Operator").fadeOut();
	});
	$("#sign").click(function(){
		$("#Operator").fadeToggle(2000);
		$("#Register").hide();
	})

	$("#myBtn").click(function(){
		$("#myModal").fadeIn();
		$("#RegisterAd").fadeIn(500);
	});

	$("#myBtn").click(function(){
		$("#myModal").fadeIn();
		$("#RegisterAd").fadeIn(500);
	});

	$(".fa-times").click(function(){
		$("#myModal").fadeOut();
		$("#RegisterAd").fadeOut();
	});

		$("#message-error").slideDown(500);
		$("#message-error").fadeOut(1000);

		$("#message-errorPass").slideDown(500);
		$("#message-errorPass").fadeOut(1000);

		$("#message-errorUser").slideDown(500);
		$("#message-errorUser").fadeOut(1000);

//		$("#register-error").fadeIn(850);
//		$("#register-error").fadeOut(500);
//		$("#register-error2").fadeIn(850);
//		$("#register-error2").fadeOut(500);

		$("#admin-error").fadeIn(1000);
		$("#admin-error").fadeOut(900);

	$("#registerbtn").click(function(){
		$("#Operator").fadeIn();
		$("#Register").fadeOut(100);
	});

	$("#registeradbtn").click(function(){
		$("#Administrator").fadeIn(1000);
		$("#myModal").fadeOut(500);
	});


    $("#welcome").fadeIn(1000);
    $("#welcome").fadeOut(600);

   

});