<!DOCTYPE html>
<!-- index.php -->
<?php session_start() ?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="./irc.css" />
		<script language="javascript" type="text/javascript" src="./irc.js"></script>
	</head>
	<?php
		$_SESSION['user'] = "..."; // Ici le nom d'utilisateur
		$user = $_SESSION['user'];
	?>
	<body>
		<div class="tchat">
			<div class="title">
				<h3>Chat IRC</h3>
			</div>
			<div class="tchat_body">
				<div id="tchat_area">
					<?php
						$history = fopen('./history.htm', 'r+');
						$frame = fgets($history);
						
						if(!isset($_POST['message'])) {
							echo("");
						}
						else if($_POST['message']) {
							$msg = $_POST['message'];
							if($msg == "Ecrivez votre message...") {
								echo("");
							}
							else {
								$sending = '> '.$user.': '.$msg.'<br />';
								fputs($history, $sending);
								$frame = $frame.$sending;
							}
						}
						
						echo("<p>Chargement en cours...</p>");
						fclose($history);
					?>
				</div>
				<div class="tchat_entry">
					<form method="post" action="#">
						<input type="text" id="text_input" name="message" value="Ecrivez votre message..." onfocus="info_tchat(this.value);" onblur="info_tchat(this.value);" />
						<input type="submit" value="Envoyer" />
					</form>
				</div>
				<script language="javascript" type="text/javascript">
					var lien = <?php echo("'".$path."'"); ?>;
					element = document.getElementById('tchat_area');
					element.scrollTop = element.scrollHeight;
					document.getElementById('text_input').focus();
				</script>
			</div>
		</div>
	</body>
</html>
<!-- END -->
