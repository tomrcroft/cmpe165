<html>
<body>
	<?php
	require_once 'swift/lib/swift_required.php';

	$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
	  ->setUsername('corq.org')
	  ->setPassword('wearecorq');

	$mailer = Swift_Mailer::newInstance($transport);

	$message = Swift_Message::newInstance('Test Subject')
	  ->setFrom(array('corq.org@gmail.com' => 'Corq.org'))
	  ->setTo(array('mmilanovich@gmail.com'))
	  ->setBody('This is a test mail.');

	$result = $mailer->send($message);
	?>
</body>
</html>