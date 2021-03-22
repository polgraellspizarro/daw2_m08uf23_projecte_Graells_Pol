<?php
	require 'vendor/autoload.php';
	use Laminas\Ldap\Attribute;
	use Laminas\Ldap\Ldap;
	
	ini_set('display_errors', 0);
	if ($_POST['usr'] && $_POST['ou']){

	    $uid = $_POST['usr'];
	    $unorg = $_POST['ou'];
    	$dn = 'uid='.$uid.',ou='.$unorg.',dc=fjeclot,dc=net';
    	#Opcions de la connexió al servidor i base de dades LDAP
    	$opcions = [
    		'host' => 'zend-pogrpi.fjeclot.net',
    		'username' => 'cn=admin,dc=fjeclot,dc=net',
    		'password' => 'fjeclot',
    		'bindRequiresDn' => true,
    		'accountDomainName' => 'fjeclot.net',
    		'baseDn' => 'dc=fjeclot,dc=net',		
    	];

    	$ldap = new Ldap($opcions);
    	$ldap->bind();
    	if ($ldap->delete($dn))	echo "<b>Entrada esborrada</b><br>"; 
    	else echo "<b>Aquesta entrada no existeix</b><br>";	
	}
?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>
    ELIMINAR USUARIS DE LA BASE DE DADES LDAP
    </title>
    </head>
    <body>
    	<form action="http://zend-pogrpi.fjeclot.net/daw2_m08uf23_projecte_Graells_Pol/esborrarusuari.php" method="POST">
            Unitat organitzativa: <input type="text" name="ou"><br>
            Usuari: <input type="text" name="usr"><br>
            <input type="submit"/>
            <input type="reset"/>
		</form>
		<a href="http://zend-pogrpi.fjeclot.net/daw2_m08uf23_projecte_Graells_Pol/menu.php">Torna al menu</a>
	</body>
</html>















