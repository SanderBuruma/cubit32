<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Reading Epu files</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
<pre>
<?php

$zip = new ZipArchive;
// print_r(dirname(__DIR__)."readEpub\\\n");
// print_r($zip->extractTo(dirname(__DIR__).'\\readEpub\\',["p10ans_ebook.htm"]));
// print_r($zip->count());

// $zip->open('p10commun.epub',0);
// for ($i = 0; $i < $zip->count() ; $i++) {
//   if (preg_match("/^.*?\.htm/", $zip->getNameIndex($i),$matches)) {
//     print_r($zip->getNameIndex($i)."\n");
//     $zip->extractTo(dirname(__DIR__).'\\readEpub\\',[$matches[0]]);
//   }
// }
// $zip->close();

$external = file_get_contents('http://www.papalencyclicals.net/councils/');
$external = preg_split("/<a href\=\"/",$external);
foreach ($external as $v) {
  if (preg_match('/http:\/\/www\.papalencyclicals\.net\/councils\/(.*?)\.htm/',$v,$matches)) {
    print_r($matches);
  }
}
var_dump($external);


?>
</pre>
</body>
</html>