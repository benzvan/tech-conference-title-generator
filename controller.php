<?php
$listOfNouns = "nouns.txt";
$listOfVerbs = "verbs.txt";
$listOfAdjectives = "adjectives.txt";
$listOfTitleFormats = "titleFormats.txt";

$URI = $_SERVER['REQUEST_URI'];

if ( $URI === '/' ) {
  showMainPage();
} elsif ( $URI === '/get/*' ) {
  get($URI.split('/',2);
}

?>

