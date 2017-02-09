<?php

// 温泉を模倣したプログラム
// データ: 初期値(50000[リットル])、給水、排水
// 満水: 100000[リットル]
// カラ: 0[リットル]
// 満水になったらそれ以上は給水できない処理
// カラになったらそれ以上は排水できない処理
// データは変数で管理する
// 入力順序
// 1. ユーザが1-4を選択してどの処理を行うか決定する
// 2. 給水 or 排水を選択した場合にユーザが指定水量を入力する。
// 温度をあげる処理。温度をあげると全体の水量の5%蒸発して水量がそのぶん減少するとする。

// 1.
//  [現在水量は__リットルです。]

// 2.
//  [何リットル給水しますか?] >
//  [__リットル給水しました。] >
//  [現在水量は__リットルです。]

// 3.
//  [何リットル排水しますか?] >
//  [__リットル排水しました。] >
//  [現在水量は__リットルです。]

// 4.
// bye

// 1. 気温を入力
// 2. 気温を入力すると、季節を判定し、秋か冬だと温度を自動的に上げ、水量が5%蒸発する。

// 1. 現在水量表示
// 2. 給水する
// 3. 排水する
// 4. 温度上昇処理
// 5. プログラムを終了する
// 6. AIと雑談

  class Spa {

    // プロパティ
    // 水量
    public $remainingWater;
    const MAX = 10000;

    // コンストラクタ
    // 水量の初期値を1000リットルでインスタンス化
    public function __construct($remainingWater) {
      $this->remainingWater = $remainingWater;
    }

    // メソッド
    // 水量表示
    public function displayInfo() {
      echo $this->remainingWater . "\n";
    }

    // 給水処理
    public function inputWater($input) {
      $this->remainingWater += $input;
    }
    // 排水処理
    public function outputWater($output) {
      $this->remainingWater -= $output;
    }

    // 温度上昇処理
    public function upTemp() {
      $this->remainingWater *= 0.95;
    }

  }

  class OverHumidityException extends Exception{}

  $spa = new Spa(1000);

  echo "[input temperature] >";
  $temperature = trim(fgets(STDIN));

  // 季節を判定する条件分岐
  if ($temperature >= 21) {
    $season = '夏';
  } else if($temperature >= 16) {
     $season = '春';
  } else if($temperature >= 11) {
     $season = '秋';
  } else if($temperature >= 0 || $temperature < 0 ) {
     $season = '冬';
  }

  if ($season == '秋' || $season == '冬') {
    $spa->upTemp();
    echo "私はAIです。外は寒いので温度を上げておきました。\n";
  } else {
    echo "私はAIです。外は暑いので温度を上げていません。\n";
  }

  while (true) {

    echo "[1.水量表示 2.給水 3.排水 4.温度上昇 5.プログラム終了 6. AIと雑談 ] > ";
    $selectedOption = trim(fgets(STDIN));

    if ($selectedOption == 1) {
      // 水量表示
      $spa->displayInfo();
    } else if ($selectedOption == 2) {
      // 給水
      echo "[何リットル給水しますか。] > ";
      $input = trim(fgets(STDIN));
      if (($input + $spa->remainingWater) > Spa::MAX) {
        echo "満水を超えます。\n";
        continue;
      } else {
        $spa->inputWater($input);
      }
    } else if ($selectedOption == 3) {
      // 排水
      echo "[何リットル排水しますか。] > ";
      $output = trim(fgets(STDIN));
      if ($spa->remainingWater - $output < 0) {
        echo"水量を0より小さくすることはできません。\n";
        continue;
      } else {
        $spa->outputWater($output);
      }
    } else if ($selectedOption == 4) {
      // 温度をあげる。
      $spa->upTemp();
      echo "温度あげたので水量が5%減少しました。\n";
    } else if ($selectedOption == 5) {
      //プログラム終了
      echo "bye\n";
      break;
    } else if($selectedOption == 6) {
      $sunny = '晴れ';
      $cloudy = '曇り';
      $rainy = '雨';
      $snow = '雪';
      $temperature;
      $humidity;
      $season;
      $weather;

      while (true) {
        echo "[input temperature] >";
        $temperature = trim(fgets(STDIN));
        if($temperature=="fuck") break;
        echo "[input humidity] >";
        $humidity = trim(fgets(STDIN));
        if ($humidity=="fuck") break;
        // 季節を判定する条件分岐
        if ($temperature >= 21) {
          $season = '夏';
        } else if($temperature >= 16) {
          $season = '春';
        } else if($temperature >= 11) {
          $season = '秋';
        } else if($temperature >= 0 || $temperature < 0 ) {
          $season = '冬';
        }
        try {
          // 天気を判定する条件分岐
          if ( $humidity == 100 && ($temperature>=0 && $temperature<=10) ) {
            $weather = '雪';
          } else if ($humidity > 100) {
            $error = 'Input within 100 degrees to humidity.';
            throw new OverHumidityException($error);
          } else if ($humidity == 100) {
            $weather = '雨';
          } else if ($humidity >= 50) {
            $weather = '曇り';
          } else if ($humidity >= 0) {
            $weather = '晴れ';
          } else if ($humidity < 0) {
            $error = 'Input plus or zero value to humidity.';
            throw new Exception($error);
          }
        } catch (OverHumidityException $e) {
          echo $e->getMessage() . "\n";
          break;
        } catch (Exception $e) {
          echo $e->getMessage() . "\n";
          break;
        }
        // 結果表示
        echo 'どうやら今の季節は' . $season . 'で、今日の天気は' . $weather . "みたいだね。僕も外を見てみたいよ。\n";
        echo "あ、それと、僕と話すのがいやになったら fuck って言ってね、いなくなるから。\n";
      }
      } else {
    echo "不正な入力値です。数値を入力してください。\n";
    continue;
  }
}
