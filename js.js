$(document).ready(function() {
	$("#contactus").click(function() {
		confirmSignaler();
		
		$('#btnAnnuler').click(function() {
		document.getElementById("message").style.margin="20%";
			$("#messageWrapper").removeClass("visible");
			return false;
		});
			
		$('#btnEnvoyer').click(function() {
			var dataString = "courriel=" + $("#courrielSignaler").val() + "&sujet=" + $("#sujetSignaler").val() + "&message=" + $("#messageSignaler").val();
			$.ajax({  
				url: "signaler.php", 
				type: "POST",   
				data: dataString,
				success: function(msg) {
					if(msg=="") {
						confirmOther("Erreur","Une erreur est survenue. Veuillez réessayer.");
						$('#btnEnvoyer').click(function() {
							document.getElementById("message").style.margin="20%";
							$("#messageWrapper").removeClass("visible");
							return false;
						});
						return false;
					} else if(msg=="manque") {
						confirmOther("Erreur","Veuillez remplir tous les champs. Veuillez réessayer.");
						$('#btnEnvoyer').click(function() {
							document.getElementById("message").style.margin="20%";
							$("#messageWrapper").removeClass("visible");
							signaler();
						});
						return false;
					} else {
						$('#message').html("<h4>Le signalement a bien été envoyé!</h4><p>Vous recevrez une copie du message envoyé dans les prochaines minutes.</p><p>Merci beaucoup de nous aider à améliorer le site!</p><br/><input type=\"button\" class=\"button\" name=\"envoyer\" id=\"btnEnvoyer\" value=\"OK\"/>");
						$('#btnEnvoyer').click(function() {
							document.getElementById("message").style.margin="20%";
							$("#messageWrapper").removeClass("visible");
							return false;
						});
					}
				}
			});
		});
	});

	function confirmSignaler(){
		document.getElementById("message").style.margin="15%";
		$("#messageWrapper").addClass("visible");
	}
});