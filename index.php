<?php
	define('USER','root');
	define('PASS','');
	define('DNS','mysql:host=localhost;dbname=mymovies');

	try {
		$bdd = new PDO(DNS,USER,PASS);
	
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(Exception $e){
		die('ERREUR : '.$e->getMessage());
	}

	$sql= "SELECT * FROM movie";
    $reponse = $bdd->query($sql);
    $donnees = $reponse->fetchAll();

    $array = array();
 	$array2 = array();
 	$j=0;

for($i=0; $i<sizeof($donnees); $i++) {
   	$array['id'] = $donnees[$i]['mov_id'];
  	$array['title'] = utf8_encode($donnees[$i]['mov_title']);
  	$array['descritption'] = utf8_encode($donnees[$i]['mov_description']);
  	$array['director'] = utf8_encode($donnees[$i]['mov_director']);
   	$array['year'] = utf8_encode($donnees[$i]['mov_year']);	

   	$array2[$j] = $array;
   	$j++;
}
 
	echo json_encode($array2);

?>
