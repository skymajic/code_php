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
  public function addTimeToStudy($study) {
    $this->study += $study;
  }

  public function addTimeToWork($work) {
    $this->work += $work;
  }

  public function addTimeToPlay($play) {
    $this->play += $play;
  }

  public function addTimeTo($books) {
    $this->books += $books;
  }

  public function addTimeToSports($sports) {
    $this->sropts += $sports;
  }

  public function addTimeToTrip($trip) {
    $this->trip += $trip;
  }

  // パーセンテージを計算する処理

  // 全要素とパーセンテージを列挙する処理
  public function show() {
    echo "success!!!\n";
  }

}


$human = new Human();


  echo "[もしも1年間自由に時間が使えるとしたら、あなたは何に何日費やしますか。]\n";
  echo "[1:勉強, 2:仕事, 3:遊び, 4:読書, 5:運動, 6:旅行 : 365日] \n";


    echo "残り365日\n";
    echo "[勉強に365日のうち何日費やしますか。] > ";
    $study = trim(fgets(STDIN));
    $human->addTimeToStudy($study);

    echo "残り365日\n";
    echo "[仕事に365日のうち何日費やしますか。] > ";
    $work = trim(fgets(STDIN));
    $human->addTimeToWork($work);

    echo "残り365日\n";
    echo "[遊びに365日のうち何日費やしますか。] > ";
    $play = trim(fgets(STDIN));
    $human->addTimeToPlay($play);

    echo "残り365日\n";
    echo "[読書に365日のうち何日費やしますか。] > ";
    $books = trim(fgets(STDIN));
    $human->addTimeTo($books);

    echo "残り365日\n";
    echo "[運動に365日のうち何日費やしますか。] > ";
    $sports = trim(fgets(STDIN));
    $human->addTimeToSports($sports);

    echo "残り365日\n";
    echo "[旅行に365日のうち何日費やしますか。] > ";
    $trip = trim(fgets(STDIN));
    $human->addTimeToTrip($trip);

    echo "success!!\n";

    echo $human->remainingDays . "\n";
    // $human->show();
