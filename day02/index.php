<?php

// 外国人と話すときのタブーを学ぶプログラム
// 外国人(コンピュータ)が話しかけてくる。
// 正解の選択肢は2つ、間違いの選択肢は2つ。計4つの選択肢が3問。
// 1-4の選択肢から返答を選択して、タブーに触れてなければ会話が続く。3回会話が続けば君とは友人になれそうだという旨の文言表示があり、外国人(コンピュータ)と友達になれる。タブーに触れる解答をした場合に、コンピュータは真剣に腹を立て、プログラミングは強制終了する。強制終了時の決まり文句は、sun of a bitch !!!


class Question {

  //プロパティ
  public $question;
  public $answer_1;
  public $answer_2;
  public $answer_3;
  public $answer_4;
  public $answer_5;
  public $answer_6;
  public $answer_7;
  public $answer_8;
  public $answer_9;

  // コンストラクタ
  function __construct($question, $answer_1, $answer_2, $answer_3, $answer_4, $answer_5, $answer_6, $answer_7, $answer_8) {
    $this->question = $question;
    $this->answer_1 = $answer_1;
    $this->answer_2 = $answer_2;
    $this->answer_3 = $answer_3;
    $this->answer_4 = $answer_4;
    $this->answer_5 = $answer_5;
    $this->answer_6 = $answer_6;
    $this->answer_7 = $answer_7;
    $this->answer_8 = $answer_8;
  }

  // メソッド
  public function processing() {
    echo "[wassap] $this->question\n";
    echo "[option1: $this->answer_1]\n";
    echo "[option2: $this->answer_2]\n";
    echo "[option3: $this->answer_3]\n";
    echo "[option4: $this->answer_4]\n";

    echo "[input option number] > ";
    $selected = trim(fgets(STDIN));

    if ( $selected == 1 ) {
      echo "$this->answer_5\n";
      echo "bye\n";
      exit;
    } else if ( $selected == 2 ) {
      echo "$this->answer_6\n";
      echo "bye\n";
      exit;
    } else if ( $selected == 3 ) {
      echo "$this->answer_7\n";
    } else if ( $selected == 4 ) {
      echo "$this->answer_8\n";
    }
  }

}


$question_1 = new Question("今からなんの話をする?", "宗教", "政治", "文化", "仕事","sun of a bitch !!!", "sun of a bitch !!!", "私の村の唯一の娯楽は古びた映画館なの。", "週3日、スーパーでバイトしてるの。" );
$question_2 = new Question("信心深い人には何を薦める?", "酒","肉","野菜","音楽","sun of a bitch !!!","sun of a bitch !!!","家の畑に行って野菜を収穫してその日のご飯にするの。","私はベートーベンを敬愛しているの。");
$question_3 = new Question("どういう女の子が好き?", "白人パツキンの姉ちゃん", "アジア系の姉ちゃん", "人種にこだわらない", "君が好き", "sun of a bitch !!!", "sun of a bitch !!!", "あなたはポリコレを知ってるのね。", "はあ?");

$question_1->processing();
$question_2->processing();
$question_3->processing();

echo "君とは友達になれそうだね。\n";
