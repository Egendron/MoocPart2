<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
	echo $e;
	break;
}
	echo '<!DOCTYPE html>
		<head>
		<meta charset="utf-8" />
		<title>Emmanuel Gendron</title>
		<link rel="stylesheet" href="./custom.css" />
		</head>
		<body>
		<header><h1>TP Mini Chat</h1></Header>';
	include('Saisie.html');
	$reponse = $bdd->query('SELECT CreationDate,Message,User FROM exo_chat ORDER BY CreationDate DESC;');
//initialisation du tableau

	echo '<table><tr><th>Heure du message</th><th>Utilisateur</th><th>Message</th></tr>';
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	$date = new DateTime($donnees['CreationDate']);
?>

	<p>
	<?php echo '<tr><td>'.date_format($date, 'd-m-Y H:i:s').'</td><td>'.$donnees['User'].'</td><td>'.$donnees['Message'].'</td></tr>'; ?> 
	</p>
<?php
}
$reponse->closeCursor(); // Termine le traitement de la requête
// on clos le tableau
echo '</table>
	</body>';
?>



