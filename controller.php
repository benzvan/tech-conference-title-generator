<?php
$dataDirectory = "data"
$listOfNouns = $dataDirectory . "/nouns.txt";
$listOfVerbs = $dataDirectory . "/verbs.txt";
$listOfAdjectives = $dataDirectory . "/adjectives.txt";
$listOfTitleFormats = $dataDirectory . "/titleFormats.txt";

$URI = $_SERVER['REQUEST_URI'];

if ( $URI === '/' ) {
  showMainPage();
} elsif ( $URI === '/get/*' ) {
  get($URI.split('/',2);
}

?>

