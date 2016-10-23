<?php

try
{
	$user='root';
	$pw='';
	$bdd='projet_web';
	
	$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web', 'root','');

	$dbh->beginTransaction();

	$stmt = $dbh->prepare("Select * from restaurant where  NomR like :rech");

	
	$stmt->bindParam(':rech',$rech);

	
	$rech=$_POST['recherche'];
	$rech= "%".$rech."%";
	

	$stmt->execute();

	while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		
     	echo $donnees['ID_R'].'  '.$donnees['NomR'].'  '.$donnees['Adresse'].'  '.$donnees['CP'].'  '.$donnees['Specialite'].'  '.$donnees['Tel'].'  '.$donnees['Capacite'].'  '.$donnees['Description'].'  '; 
     	echo '<br/>'; 

	}
 

}	
catch(PDOException $e)
{
	print "Erreur ! : " . $e->getMessage();
} 

//header('Location: Acceuil.php');
//exit();

?>