<?php

$dataPath = "data";

$listOfFiles = [
  "noun" => $dataPath . "/" . "nouns.txt",
  "verb" => $dataPath . "/" . "verbs.txt",
  "adjective" => $dataPath . "/" . "adjectives.txt",
  "addonPhrase" => $dataPath . "/" . "addonPhrases.txt",
  "titleFormat" => $dataPath . "/" . "titleFormats.txt",
];

$cwd = dirname(__FILE__);

$noQuery = split("\?",$_SERVER['REQUEST_URI'])[0];
//$URI = split("/",$_SERVER['REQUEST_URI']);
$URI = split("/",$noQuery);



function getRandomString($stringType, $stringModifier ) {
  global $listOfFiles;
  global $cwd;
  if ( $listOfFiles[$stringType] != "" ) {
    #print "string type = $stringType\n";
    #print "file to read = $listOfFiles[$stringType]\n";
    $fileContents = file( "file://$cwd/$listOfFiles[$stringType]");
    $lineContents = split("@@",$fileContents[mt_rand(0, count($fileContents) - 1)]);
    
    if ( "$stringType" == "noun" ) {
      if ( "$stringModifier" == "plural" ) {
        if ( count($lineContents) == 2 ) {
    	  return trim($lineContents[1]);
        } else {
          return trim($lineContents[0]) . "s";
        }
      } else {
        return trim($lineContents[0]);
      }

    } else if ( "$stringType" == "adjective" ) {
      return trim($lineContents[0]);

    } else if ( "$stringType" == "verb" ) {
      if ( "$stringModifier" == "present" ) {
        return trim($lineContents[1]);
      } else if ( "$stringModifier" == "past" ) {
        return trim($lineContents[2]);
      } else {
        return trim($lineContents[0]);
      }

    } else if ( "$stringType" == "addonPhrase" ) {
      return trim($lineContents[0]);

    } else if ( "$stringType" == "titleFormat" ) {
      return trim($lineContents[0]);

    } else {
      return "unrecognized getString type";
    }

  } else {
    return "No";
  }
}

if ( $URI[1] == "get"  ) {
// Return json
  if ( count($URI) == 4 ) {
    $result = [ 'string' => getRandomString($URI[2],$URI[3]) ];
  } else if ( count($URI) == 3 ) {
    $result = [ 'string' => getRandomString($URI[2],"") ];
  }
  header('Content-type: application/json');
  echo json_encode($result);
} else {
// Display page
  include "file://$cwd/mainpage.html";
}

?>
