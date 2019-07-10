<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$subject = $_POST['subject'];

	header('Content-Type: application/json');

	if ($name === ''){
		print json_encode(array('message' => '<div class="alert alert-warning alert-dismissible fade show mb-0 mt-2" role="alert"><p class="mb-0">Ingresá tu nombre.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 0));
		exit();
	}
	if ($email === ''){
		print json_encode(array('message' => '<div class="alert alert-warning alert-dismissible fade show mb-0 mt-2" role="alert"><p class="mb-0">Ingresá tu e-mail.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 0));
		exit();
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			print json_encode(array('message' => '<div class="alert alert-warning alert-dismissible fade show mb-0 mt-2" role="alert"><p class="mb-0">Ingresá un e-mail válido.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 0));
			exit();
		}
	}
	// if ($subject === ''){
	// print json_encode(array('message' => '<div class="alert alert-warning alert-dismissible fade show mb-0 mt-2" role="alert"><p class="mb-0">Ingresá el asunto.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 0));
	// exit();
	// }
	if ($message === ''){
		print json_encode(array('message' => '<div class="alert alert-warning alert-dismissible fade show mb-0 mt-2" role="alert"><p class="mb-0">Ingresá tu mensaje.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 0));
		exit();
	}

	$content="De: $name \nE-mail: $email \nMensaje: $message";
	$recipient = "info@logostraslados.com.ar";
	$mailheader = "De: $email \r\n";

	mail($recipient, $subject, $content, $mailheader) or die("Ups, hubo un error!");

	print json_encode(array('message' => '<div class="alert alert-success alert-dismissible fade show mb-0 mt-2" role="alert"><h4 class="alert-heading">Listo!</h4><p class="mb-0">En breve nos pondremos en contacto.</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>', 'code' => 1));

	exit();
?>