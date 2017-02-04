<?php

  // ユーザ入力
  // $inputvalue = trim(fgets(STDIN));
  // CUIでphpプログラムを実行   ./index.php

  // 仕様
  // 気温と湿度を入力すると、プログラムが季節と天気を予想し、季節と天気を出力する。
  // fuck と入力すると、bye と表示され、プログラムが終了する。
  // 入力値が不足している場合は、プロンプトを表示する。
  // 気温で季節を判定し、湿度で天気を判定する。 0-10度:冬  11-15:秋 16-20度:春 21-30度: 夏

$sunny = '晴れ';
$cloudy = '曇り';
$rainy = '雨';
$snow = '雪';
$temperature;
$humidity;
$season;
$weather;


class OverHumidityException extends Exception{}

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

  }

  echo "bye\n";

?>
