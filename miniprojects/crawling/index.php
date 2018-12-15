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

$indexSite = file_get_contents('http://www.papalencyclicals.net/councils/');
$indexSite = preg_split("/<a href\=\"/",$indexSite);
$readableText = [];
foreach ($indexSite as $v) {
  if (preg_match('/http:\/\/www\.papalencyclicals\.net\/councils\/(.*?)\.htm/',$v,$matches)) {

    //fetch target site
    $targetSite = file_get_contents("http://www.papalencyclicals.net/councils/".$matches[1].".htm");
    
    //fetch title
    preg_match('/<h1.*?>(.*?)<\/h1>/',$targetSite,$matches);
    $title = $matches[1];

    //fetch the main body of the text
    $expl = preg_split('/<\/h4>/',$targetSite)[1];
    $expl = preg_split('/(Introduction and translation|<a)/',$expl)[0];

    //remove bracketed garbage
    $expl = preg_replace('/\(.*?\)/','',$expl);
    $expl = preg_replace('/\{.*?\}/','',$expl);
    $expl = preg_replace('/\[.*?\]/','',$expl);

    //remove tags
    $expl = preg_replace('/<(strong|em) ?.*?>(.*?)<\/\1>/','/$2/',$expl);

    $expl = preg_split('/<(p|ol|ul|li).*?>\n\s+/',$expl);

    //split by periods
    $expl = preg_split('/(\.)/',$expl[0]);
    foreach($expl as $vv) {
      $temp = preg_replace('/<\/?(strong|p|ul|li|ol|h[2-5]).*?\>/','',$vv);
      $temp = preg_replace('/[{([].*/','',$temp);
      $temp = preg_replace('/\].*/','',$temp);
      $temp = preg_replace('/\).*/','',$temp);
      $temp = preg_replace('/\}.*/','',$temp);
      $temp = preg_replace('/&\#\d{4}/','',$temp);
      $temp = preg_replace('/\//','',$temp);
      $temp = preg_replace('/\;/','',$temp);
      if (strlen($temp) > 15 && preg_match('/[^a-zA-Z0-9 ].+/',$temp)) {
        preg_match('/^.*?([A-Z][a-z].+)/',$temp,$matches);
        $readableText[] = $matches[1].".";
      }
    };
    break;  
  }
}
echo (explode(" &#8211; ",$title)[0]);
foreach($readableText as $k => $v) {
  echo "<br>$k: ".$v;
}


?>