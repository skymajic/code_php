<?php

// DBとphpの連携の復習。プログラムとは関係ない。

define('DB_DATABASE', 'day03');
define('DB_USERNAME', 'mno');
define('DB_PASSWORD', 'rabbit');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

try {
  // connect
  $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // select yen1000
  $stmt = $db->prepare("select yen1000 from storedCoin");
  $stmt->execute();

  $coins = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($coins as $coin) {
    echo $coin["yen1000"];
  }


  // select yen500
  $stmt = $db->prepare("select yen500 from storedCoin");
  $stmt->execute();

  $coins = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($coins as $coin) {
    echo $coin["yen500"];
  }

  // select yen100
  $stmt = $db->prepare("select yen100 from storedCoin");
  $stmt->execute();

  $coins = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($coins as $coin) {
    echo $coin["yen100"];
  }

  // select yen50
  $stmt = $db->prepare("select yen50 from storedCoin");
  $stmt->execute();

  $coins = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($coins as $coin) {
    echo $coin["yen50"];
  }

  // select yen10
  $stmt = $db->prepare("select yen10 from storedCoin");
  $stmt->execute();

  $coins = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($coins as $coin) {
    echo $coin["yen10"];
  }


} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
