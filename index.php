<?php
require_once __DIR__ . "/vendor/autoload.php";

$m = new MongoClient('localhost');
if ($m){
  echo "Connection created</br>";
  try{
    $db = $m -> testdb2;
    echo "DB created</br>";
    //$col = $db -> createCollection("testcollection");
    //$collection = (new MongoDB\Client)->testdb2->testcollection2;
    /*$doc = $collection -> findOne(
      ['username' => new MongoDB\BSON\Regex('.d.')]
    );*/
    /*$insertOneResult = $collection->insertOne([
    'username' => 'admin',
    'email' => 'admin@example.com',
    'name' => 'Admin User',
]);

printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
    var_dump($insertOneResult->getInsertedId());*/
    /*$doc = $collection -> updateOne(
      ['name' => new MongoDB\BSON\Regex('.d.')],
      ['$set' => ['firstname' => 'Administration',
                'lastname' => ' User']]

    );*/
    $col = $db -> testcollection2;
    $co = $col -> findandmodify(
      array("email" => 	new MongoDB\BSON\Regex('.d.')),
      array('$set' => array("email" => array("username" => "admin","domain" => "example.com")))
    );
    echo "<pre>";
    var_dump($co);
    echo "=====================</br>";
    //print_r($co -> getmatchedcount());
    echo "======================</br>";
    //print_r($doc -> getmodifiedcount());
    echo "</pre>";
  }
  catch(exception $e){
    echo $e -> getmessage();
  }

}
else{
  echo "connection not created";
}
?>
