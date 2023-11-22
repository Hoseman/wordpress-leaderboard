<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);

	require_once '../config.php';
	
	//prepare the connection
	$conn = new PDO('mysql:host=localhost;dbname='.$dbname, $dbuser, $dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Get me all the point_types in an array:
	$types =  $conn->prepare("SELECT * from `point_types`");
	$types->execute();
	$typesResult = $types->fetchAll();
	foreach($typesResult as $value):
		$typesArray[$value['id']]['type'] = $value['type'];
		$typesArray[$value['id']]['plusminus'] = $value['plusminus'];
	endforeach;

	//Get me all the dealers in an array:
	$dealers =  $conn->prepare("SELECT * from `dealers`");
	$dealers->execute();
	$dealersResult = $dealers->fetchAll();
	foreach($dealersResult as $value):
		$dealersArray[$value['id']] = $value['dealers'];
	endforeach;

	//Get me all the categories in an array:
	$categories =  $conn->prepare("SELECT * from `categories`");
	$categories->execute();
	$categoriesResult = $categories->fetchAll();
	foreach($categoriesResult as $value):
		$categoriesArray[$value['id']] = $value['category'];
	endforeach;

	//Get me all the sales people in an array:
	$users =  $conn->prepare("SELECT * from `users`");
	$users->execute();
	$usersResult = $users->fetchAll();
	foreach($usersResult as $value):
		$usersArray[$value['id']]['id'] = $value['id'];
		$usersArray[$value['id']]['name'] = $value['name'];
		$usersArray[$value['id']]['lastname'] = $value['lastname'];
		$usersArray[$value['id']]['nickname'] = $value['nickname'];
	endforeach;
	
	//Get me all the rules in an array:
	$rules =  $conn->prepare("SELECT * from `point_rules`");
	$rules->execute();
	$rulesResult = $rules->fetchAll();
	foreach($rulesResult as $value):
		if($typesArray[$value['point_type']]['plusminus'] == 0):
			$rulesArray[$value['category']][$value['point_type']]['points'] = -abs($value['points']);
		else:
			$rulesArray[$value['category']][$value['point_type']]['points'] = $value['points'];
		endif;
			$rulesArray[$value['category']][$value['point_type']]['type'] = $typesArray[$value['point_type']]['type'];
	endforeach;
	
	if(isset($_GET['display_name'])):
		$sth = $conn->prepare("SELECT * from `new_results` WHERE userId='" . $_GET['display_name'] . "'");
	else:
		$sth = $conn->prepare("SELECT * from `new_results`");
	endif;

	$sth->execute();
	$points = $sth->fetchAll(); 	

	// 在这里一定注意，程序第一行，一定不要有空的行，有几行，这几行机会加到csv文件的顶部
	$data[]=array("Name","Dealership","Customer Name", "Category", "Points Type", "Points", "Date", "Date Created");
	
	if(count($points) > 0):
		foreach($points as $value):
			$data[]=array($usersArray[$value['userId']]['name'] . ($usersArray[$value['userId']]['nickname'] != '' ? ' \'' . $usersArray[$value['userId']]['nickname'] . '\' ' : ' ') . $usersArray[$value['userId']]['lastname'],$dealersArray[$value['dealership']],$value['customername'], $categoriesArray[$value['category']], $typesArray[$value['type']]['type'], $value['points'], $value['orderdate'], $value['ContactDateCreated']);
		endforeach; 
	endif;
	
	//$file=fopen("localtest/contacts.csv","w");
	$name = date('m/d/y') .'topoftheleagedata'; //The name of the csv file.
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename='.$name.'.csv');
	$output = fopen('php://output', 'w');
	foreach($data as $line)
	{
		fputcsv($output,$line);
	}
	
	fclose($file);

?>