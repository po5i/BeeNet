<?php
//var_dump($_POST);
$tab_questions = json_decode($_POST["tab_questions"]);
$score = $tab_questions->percentageCorrectAnswers;
$name = htmlentities($_POST["name"]);
$email = htmlentities($_POST["email"]);
$phone = htmlentities($_POST["phone"]);
$company = htmlentities($_POST["company"]);

mysql_connect("localhost", "root", "posi") or die(mysql_error());
mysql_select_db("apivita") or die(mysql_error());

// Insert a row of information into the table "example"
$insert = sprintf("insert into questionary(name,email,company,phone,score,questions) values('%s','%s','%s','%s','%s','%s') ",
			$name,
			$email,
			$company,
			$phone,
			$score,
			$_POST["tab_questions"]
);
mysql_query($insert) or die(mysql_error());  
echo "ok";

?>