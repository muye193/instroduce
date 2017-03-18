<?php
try{
	$pdo = new PDO("mysql:host=localhost;dbname=ijdb",'yuanlei','123456');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
	}
	catch(PDOException $e){
		$error = "不能连接数据库".$e->getMessage();
		include "error.html.php";
		exit();
	}
if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_GET, 'stripslashes_gpc');
    array_walk_recursive($_POST, 'stripslashes_gpc');
    array_walk_recursive($_COOKIE, 'stripslashes_gpc');
    array_walk_recursive($_REQUEST, 'stripslashes_gpc');
}
if(!isset($_GET['creat'])){
	include "client.html.php";
	}
else{
		try
		{$sql='CREATE TABLE message(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,name TEXT,email TEXT, text TEXT)DEFAULT CHARACTER SET utf8 ENGINE=INNODB';
		$pdo->exec($sql);
		include 'succes.php';}
		catch(PDOException $e){
		include "old.html.php";
		exit();}
}
if(isset($_POST['Name'])&& isset($_POST['E-mail']) && isset($_POST['text']))
{
	try{
		$sql='INSERT INTO message SET name=:name,email=:email,text=:text';
		$s = $pdo->prepare($sql);
		$s->bindValue(':name',$_POST['Name']);
		$s->bindValue(':email',$_POST['E-mail']);
		$s->bindValue(':text',$_POST['text']);
		$s->execute();
		header('Location:.');
		exit();
		}
		catch(PDOException $e){
		$error = "不能存储数据".$e->getMessage();
		include "error.html.php";
		exit();}
}
if(isset($_GET['Inquire'])){
	try{
		$result = $pdo->query('SELECT name ,email,text,date FROM message');
		}
	catch(PDOException $e){
		$error = "不能查询数据".$e->getMessage();
		include "error.html.php";
		exit();}
	include "list.html.php";
	}
?>
