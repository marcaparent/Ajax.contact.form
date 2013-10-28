<?php 
	ini_set("SMTP","YOURSERVER" );
	ini_set("smtp_port","YOURPORT" );

	try {
		if($_POST['courriel']!="" && $_POST['message']!="") {
		
			//Ajouter dans l'Array tous les courriels à qui on veut envoyer la commande.
			$tos = array($_POST['courriel']);

			//Préparation du courriel
			$subject = stripslashes($_POST['sujet']);
			
			$message = str_replace("\n.", "\n..", stripslashes(nl2br($_POST['message'])));

			$headers = "From: <".stripslashes($_POST['courriel']).">\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=utf-8\r\n";
			
			//Envoi du courriel à toutes les adresses du Array créé plus haut.
			$count = count($tos);
			for ($i = 0; $i < $count; $i++) {
				if(mail($tos[$i], $subject, $message, $headers))
				{	//N'importe quoi qui n'est pas vide signifiera un succès.
					echo("Success");
				}
			}
		}
		echo("manque");
	}
	catch (Exception $e){
			echo("");
	}
?>