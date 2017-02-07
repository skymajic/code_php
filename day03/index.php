<?php

// 自動販売機
// 水: 100円
// コーヒー: 120円
// 炭酸水: 150円
// ファンタ: 140円
// メロンソーダ: 130円
// お茶: 200円
// お湯: 300円
// 1000円札, 500円玉, 100円玉, 50円玉, 10円玉 を投入可能
// 1. まず商品一覧を表示して、どれか一つ選んでくださいのプロンプト
// 2. 番号を選択して、商品を一つ選ぶ
// 3. コインを投入してくださいのプロンプト
// 4. 1000, 500, 100, 50 10円以外のコインは例外処理


class NotDivideByTen extends Exception {}

while (true) {
  echo "どのドリンクを購入なされますか。決心がつきましたら番号を入力してください。やっぱり買わない場合は0を押しなさい\n";
  echo "[ (1)水:100円 (2)コーヒー:120円 (3)炭酸水:150円 (4)ファンタ:140円 (5)メロンソーダ:130円 (6)お茶:200円 (7)お湯:300円 ] > ";

  $drinkNumber = trim(fgets(STDIN));
  $drinkPrice;

  if ($drinkNumber == 1) {
    $drinkPrice = 100;
  } else if ($drinkNumber == 2) {
    $drinkPrice = 120;
  } else if ($drinkNumber == 3) {
    $drinkPrice = 150;
  } else if ($drinkNumber == 4) {
    $drinkPrice = 140;
  } else if ($drinkNumber == 5) {
    $drinkPrice = 130;
  } else if ($drinkNumber == 6) {
    $drinkPrice = 200;
  } else if ($drinkNumber == 7) {
    $drinkPrice = 300;
  } else if ($drinkNumber == 0) {
    echo "bye\n";
    break;
  }

  echo "1000円札, 500円玉, 100円玉, 50円玉, 10円玉 が使用可能でございます。\n";
  echo "[コインを投入してください] > ";

  $insertedCoin = trim(fgets(STDIN));



  if ( ($insertedCoin % 10) != 0 ) {
    try{
      echo "指定されたコインを投入してください。\n";
      continue;
    } catch (NotDivideByTen $e) {
      $e->getMessage() . "\n";
      exit;
    }
  }

  $otsuri = $insertedCoin - $drinkPrice;
  if ($otsuri < 0) {
    echo "投入金額が足りません。\n\n";
    continue;
  } else if($otsuri == 0){
    echo "ぴったりです。お釣りはありません。\n\n";
  } else {
    echo "お買い上げありがとうございました。お釣りは $otsuri 円です。\n\n";
  }


}
