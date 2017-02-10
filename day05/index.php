<?php

// human 人間
// 行動の選択肢と、それにかける時間を合計していく
// 365を分母にして、プロパティごとにその日数が何%か求める。それを[プロパティ: ??%]っていう風に全要素を列挙して表示する。
// もしも1年間自由に時間が使えるとしたら、あなたは何に何日費やしますか。

class Human {

  // プロパティ
  // 勉強
  // 仕事
  // 遊ぶ
  // 読書
  // 運動
  // 旅行

  public $study=0;
  public $work=0;
  public $play=0;
  public $books=0;
  public $sports=0;
  public $trip=0;
  public $remainingDays = 365;


  //メソッド

  // 変数に値を加算する処理
  public function calcStudy($study) {
    $this->study += $study;
    $this->remainingDays -= $this->study;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->study/365) * 100;
  }

  public function calcWork($work) {
    $this->work += $work;
    $this->remainingDays -= $this->work;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->work/365) * 100;
  }

  public function calcPlay($play) {
    $this->play += $play;
    $this->remainingDays -= $this->play;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->play/365) * 100;
  }

  public function calcBooks($books) {
    $this->books += $books;
    $this->remainingDays -= $this->books;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->books/365) * 100;
  }

  public function calcSports($sports) {
    $this->sports += $sports;
    $this->remainingDays -= $this->sports;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->sports/365) * 100;
  }

  public function calcTrip($trip) {
    $this->trip += $trip;
    $this->remainingDays -= $this->trip;
    echo "残り日数は" . $this->remainingDays . "です\n";
    return ($this->trip/365) * 100;
  }

  // パーセンテージを計算する処理

  // 全要素とパーセンテージを列挙する処理
  public function show() {
    echo "残り". $this->remainingDays . "日\n";
    echo "パーセンテージ% \n";
  }

}


$human = new Human();

$parcentage = 100;

  echo "[もしも1年間自由に時間が使えるとしたら、あなたは何に何日費やしますか。]\n";
  echo "[1:勉強, 2:仕事, 3:遊び, 4:読書, 5:運動, 6:旅行 : 365日] \n";


    echo "残り365日\n";
    echo "[勉強に365日のうち何日費やしますか。] > ";
    $study = trim(fgets(STDIN));
    $parcentage -= $human->calcStudy($study);

    echo "[仕事に365日のうち何日費やしますか。] > ";
    $work = trim(fgets(STDIN));
    $parcentage -= $human->calcWork($work);

    echo "[遊びに365日のうち何日費やしますか。] > ";
    $play = trim(fgets(STDIN));
    $parcentage -= $human->calcPlay($play);

    echo "[読書に365日のうち何日費やしますか。] > ";
    $books = trim(fgets(STDIN));
    $parcentage -= $human->calcBooks($books);

    echo "[運動に365日のうち何日費やしますか。] > ";
    $sports = trim(fgets(STDIN));
    $parcentage -= $human->calcSports($sports);

    echo "[旅行に365日のうち何日費やしますか。] > ";
    $trip = trim(fgets(STDIN));
    $parcentage -= $human->calcTrip($trip);

    $human->show();
    echo "$parcentage\n";
