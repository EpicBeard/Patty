<?php

date_default_timezone_set('America/New_York');

require_once ("../vendor/autoload.php");

$log = new \Monolog\Logger('PHRETS');
$log->pushHandler(new \Monolog\Handler\StreamHandler('php://stdout', \Monolog\Logger::DEBUG));

$config = new \PHRETS\Configuration;

//$config->setLoginUrl('http://www.idxseodemo.com/workarea/run_now.php');

$config->setLoginUrl('http://cat.rets.paragonrels.com/rets/fnisrets.aspx/CAT/login?rets-version=rets/1.5')
        ->setUsername('username')
        ->setPassword('userpass')
        ->setRetsVersion('1.7.2');

$rets = new \PHRETS\Session($config);
//$rets->setLogger($log);

$connect = $rets->Login();

$system = $rets->GetSystemMetadata();
//var_dump($system);

$resources = $system->getResources();
$classes = $resources->first()->getClasses();
//var_dump($classes);

$classes = $rets->GetClassesMetadata('Property');
//var_dump($classes->first());

$objects = $rets->GetObject('Property', 'Photo', '00-1669', '*', 1);
//var_dump($objects);

$fields = $rets->GetTableMetadata('Property', 'LA_2', 'Lakefront_Lkp_2=Y');
//var_dump($fields[0]);

//echo "<pre>";
//print_r($objects);
//echo "</pre>";


$results = $rets->Search('Property', 'SF_1', 'LM_char10_34=|Y');


echo "<pre>";
print_r($results->toJSON());
echo "</pre>";


//$photos = $rets->GetObject("Property", "Photo", "9577056", "*", 0);
//foreach ($photos as $photo) {
//    $photo = $photo->getContent();
//    if($photo){
//        echo "<hr><pre>";
//        var_dump($photo);
//        echo "</pre><hr>";
//    }
//}

//echo $items->getTotalResultsCount();

//$db = pg_connect("host=localhost port=5432 dbname=Houses user=postgres password=AMU5uck5");
//$query = "INSERT INTO houses VALUES ('$_POST[L_ListingID]','$_POST[L_Type]','$_POST[L_Address]')";
//$result = pg_query($query);

?>
