<?
require  'medoo.php';
 
$database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'testdb',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'my5ql',
	'charset' => 'utf8',
 
	// [optional]
	'port' => 3306,
 
	// [optional] Table prefix
	'prefix' => 'test',
 
	// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
]);
 
/*
$database->insert("table", [
	"Username" => "bob",
	"Password" => "pass",
	"Email" => "foo@bar.com"
]);
*/

$datas = $database->select("table", "*");

foreach($datas as $data)
{
	echo "user_name:" . $data["Username"] . " - email:" . $data["Email"] . "<br/>";
}

echo "<br><br>";

echo $database->last_query();

echo "<br><br>";

$profile = $database->get("table", [
	"Username",
	"Password",
	"Email"
], [
	"ID" => $_GET['ID']
]);

IF (!$profile){
	echo "Not found.";
	
} ELSE {

	echo "Username: $profile[Username] email: $profile[Email]";

}

echo "<br><br>";

echo $database->last_query();

echo "<br><br>";
?>