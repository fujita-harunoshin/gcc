<?php
  session_start();
  $mode = 'input';
  $errmessage = array();
  if( isset($_POST['confirm']) && $_POST['confirm'] ){
    // 確認
    if( !$_POST['fullname'] ) {
        $errmessage[] = "名前を入力してください";
    } else if( mb_strlen($_POST['fullname']) > 100 ){
        $errmessage[] = "名前は100文字以内にしてください";
    }
    $_SESSION['fullname'] = htmlspecialchars($_POST['fullname'], ENT_QUOTES);

    if( !$_POST['email'] ) {
        $errmessage[] = "Eメールを入力してください";
    } else if( mb_strlen($_POST['email']) > 200 ){
        $errmessage[] = "Eメールは200文字以内にしてください";
    } else if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errmessage[] = "メールアドレスが不正です";
    }
    $_SESSION['email']    = htmlspecialchars($_POST['email'], ENT_QUOTES);

    if( !$_POST['message'] ){
        $errmessage[] = "お問い合わせ内容を入力してください";
    } else if( mb_strlen($_POST['message']) > 500 ){
        $errmessage[] = "お問い合わせ内容は500文字以内にしてください";
    }
    $_SESSION['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);

    if( $errmessage ){
        $mode = 'input';
    } else {
        // 送信が成功したとき
        $message  = "お問い合わせを受け付けました \r\n"
        . "名前: " . $_SESSION['fullname'] . "\r\n"
        . "email: " . $_SESSION['email'] . "\r\n"
        . "お問い合わせ内容:\r\n"
        . preg_replace("/\r\n|\r|\n/", "\r\n", $_SESSION['message']);
        mail($_SESSION['email'],'お問い合わせありがとうございます',$message);
        mail('ushio@ushio-create.com','お問い合わせありがとうございます',$message);
        $_SESSION = array();
        $mode = 'input';
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>gcc</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi&family=Kosugi+Maru&family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="responsive.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- jQuery.jsの読み込み -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    <!-- スムーズスクロール部分の記述 -->
    <script>
    $(function(){
       // #で始まるアンカーをクリックした場合に処理
       $('a[href^=#]').click(function() {
          // スクロールの速度
          var speed = 400; // ミリ秒
          // アンカーの値取得
          var href= $(this).attr("href");
          // 移動先を取得
          var target = $(href == "#" || href == "" ? 'html' : href);
          // 移動先を数値で取得
          var position = target.offset().top;
          // スムーススクロール
          $('body,html').animate({scrollTop:position}, speed, 'swing');
          return false;
       });
    });
    </script>
  </head>
  <body>
    <header>
      <div class="header-contianer">
        <div class="header-logo">

        </div>

        <div class="openbtn"><span></span><span></span><span></span></div>
          <nav id="g-nav">
            <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
              <ul>
                <li><a href="#">Top</a></li> 
                <li><a href="#merit">Merits</a></li> 
                <li><a href="#menber">Menber</a></li> 
                <li><a href="#detail">Details</a></li>
                <li><a href="#feedback">Feedbacks</a></li>
                <li><a href="#contact-form">Contact</a></li>
              </ul>
            </div>
            <div class="mobile-logo-view">
              <img class="mobile-logo" src="./images/logo.png">
              <img class="mobile-logo-text" src="./images/logo-text.png">
              <p class="mobile-gcc-explanation">
                「世界中で活躍できる人材を輩出する」を軸に活動している団体。<br>
                U29の学生から社会人まで幅広いメンバーが200-300人ほどで<br>
                毎週、活動に励んでいます。</p>
            </div>
          </nav>

        <div class="header-right">
          <a href="#">Top</a>
          <a href="#merit">Merits</a>
          <a href="#menber">Menber</a>
          <a href="#detail">Details</a>
          <a href="#feedback">Feedbacks</a>
          <a href="#contact-form">Contact</a>
        </div>
      </div>
    </header>

    <main>
      <div class="main-container">
        <div class="logo-view">
          <div class="logo-back">
            <a href="#">
              <img class="logo-text" src="./images/logo-text.png">
              <img class="logo" src="./images/logo.png">
            </a>
            <p class="gcc-explanation">
              「世界中で活躍できる人材を輩出する」を軸に活動している団体。<br>
              U29の学生から社会人まで幅広いメンバーが200-300人ほどで<br>
              毎週、活動に励んでいます。</p>
          </div>
        </div>
        <div class="first-view-container">
          <div class="catch-image">
            <div class="bg-mask">
              <h1 class="catch-copy-1">未来のあなたを<br>変えましょう</h1>
              <p class="catch-copy-sub-1">大学新２年生と先輩の<br><span class="meeting">交流会</span></p>
              <p class="catch-copy-sub-2">大学生のうちに行動をし<br>た先輩が、あなたの悩み<br>のサポートをします。</p>
              <a class="cta" href="#contact-form">参加する</a>
            </div>
          </div>
        </div>
        <div class="body-copy-container">
          <div class="message">
            <h1>
              今、将来について<br>悩んでいませんか？
            </h1>
            <p>
              　あなたは、今していることが将来に繋がっているのか不安に感じていませんか？
              <br><br>
              　私もそうでした。私は現在大学２年生ですが、大学１年生のときは漠然と将来に対し不安を感じ、必死にプログラミングを勉強していました。
              <br>
              　しかし、しばらくして分かったことがあります。それは、１人で勉強していても、それだけでは全く将来に繋がらないということです。身に着けた技術や知識を使って、自分の思い描いている未来を実現させるまでの道のりが全く見えて来なかったのです。
              <br>
              　こうして、１人で悶々としているときに、とあるイベント経由で、１人の社会人の方と出会いました。その方は、自己実現までのロードマップや仕事で必要なスキルなどを教えてくれました。さらには、キャリアを積むために仕事も振ってくれました。
              <br>
              　これがきっかけで、今では順調に１歩１歩自己実現への階段を上っています。
              <br><br>
              　どうですか？みなさんも、自分の好きで好きでたまらない趣味や、将来のために身に着けた特技を使って学生のうちから仕事をこなし、夢見た自己実現を達成したいと思いませんか？
            </p>
          </div>
          <div class="merit" id="merit">
            <div class="merit-space"></div>
            <h2>交流会に参加するメリット</h2>
            <div class="merit-background">
              <div class="merit-content">
                <h3>１．学生のうちから行動している仲間ができる</h3>
                <p>　頑張る仲間を作ることで、自分も頑張ることができる。また、お互いに仕事をこなせるようになると、一緒に仕事ができるようになる。</p>
              </div>
              <div class="merit-content">
                <h3>２．将来に対する悩みを共有できる</h3>
                <p>　悩みを共有するだけでも、心の不安を解消することができる。また、自分の見落としているリスクを交流会で見つけることができる。</p>
              </div>
              <div class="merit-content">
                <h3>３．悩みを先輩が解消する</h3>
                <p>　学生同士で共有した悩みを解消するための糸口を、先輩社会人が教えてくれる。</p>
              </div>
              <div class="merit-content">
                <h3>４．自分のビジョンを明確にできる</h3>
                <p>　自分の成し遂げたいことは何かを先輩社会人とともに明確にする。また、それから逆算して、ロードマップを作ることができるようになる。</p>
              </div>
            </div>
          </div>
          <div class="menber" id="menber">
            <div class="menber-space"></div>
            <h2>登壇者紹介</h2>
            <div class="menber-background">
              <img class="menber-img" src="./images/profile.png">
              <p class="name-jp">片桐  幹地</p>
              <p class="name-rm">KATAGIRI  Kanchi</p>
              <p class="menber-explanation">
                青山学院大学卒。<br>
                現在はライブ配信事業を行うエンタメ事業会社でプロダクトマネジメントとマーケティングを担当。
                世界13カ国をバックパッカーで周遊。趣味は映画とサウナ。先述の社会人の方です。
              </p>
              <p class="menber-comment">コメント</p>
              <p class="menber-comment-content">
                今の大学生はコロナ禍の影響により、私が学生の時に比べて身動きができずもどかしいとの声をよく聞きます。今回、さまざまな学生と交流できることを楽しみにしています。皆様の小さな野望を教えてください。待っています。
              </p>
            </div>
          </div>
          <div class="detail" id="detail">
            <div class="detail-space"></div>
            <h2>イベントの詳細</h2>
            <table>
              <tr>
                <td bgcolor="#E3F6F5">開催場所</td><td>国立オリンピック記念青少年総合センター</td>
              </tr>
              <tr>
                <td>開催日時</td><td bgcolor="#E3F6F5">0000年0月0日(0曜日)<br>14:00-17:00</td>
              </tr>
                <td bgcolor="#E3F6F5">参加費</td><td>無料</td>
              <tr>
                <td>服装</td><td bgcolor="#E3F6F5">何でもOK</td>
              </tr>
            </table>
          </div>
          <div class="feedback" id="feedback">
            <div class="feedback-space"></div>
            <h2>参加者の声</h2>
            <div class="feedback-1">
              <p class="satisfaction">満足度：★★★★★</p>
              <p class="feedback-comment">
                将来について深く考えさせられた。
                これまでに何をしたいか等は抽象的ではあるが考えていた。
                しかし、今回のイベントを通してそれらがいかに甘い考えであったかを痛感した。
                特に経営体験ワークショップでは、たくさんの選択を迫られ、その１つ１つがとても重要であることを学んだ。
                今回のワークショップが負けという形で終わって本当に良かったと思う。
                この結果を受けて、行った選択の反省をより深くできたし、経営について本格的に学び、具体的に行動していこうと考えるようになったからである。
                僕は成長計画で決めたことは必ず達成したい。
                今回のプログラムでワークショップとはいえ、失敗を学べたことは本当に為になったと感じる。本当にありがとうございました。
              </p>
              <p class="feedback-name">青山学院大学 1年生</p>
            </div>
            <div class="feedback-2">
              <p class="satisfaction">満足度：★★★★★</p>
              <p class="feedback-comment">
                これからの大学生活で何をしたらいいのか合理的に考えられるようになった。
                私は、将来やりたいことを漠然としか考えていなかったため、今どのような行動をしたらいいのか分からなかった。
                しかし、今回のイベントを通して、自分の将来やりたいことを明確にし、そこから逆算して今何をしたらいいのかを考えられるようになった。
                また、ワークショップをやることで、自分の将来を実現するための途中経路も少し見えてきた。
                このイベントを期に、これからどんどん行動してチャンスを掴んでいきたいと思う。
              </p>
              <p class="feedback-name">電気通信大学 2年生</p>
            </div>
          </div>
          <div class="closing">
            <div class="closing-background">
              <p class="closing-top-message">今、あなたは自分の未来が変わる分岐点に立っています。</p>
              <p class="closing-sub-message">このようなイベントとは、滅多に巡り合えません。今、少し勇気をふり絞るだけで、あなたの将来は大きく変わりますよ。</p>
              <br>
              <p class="closing-sub-message closing-sub-message-2">必ずあなたを満足させます。奮ってご参加ください。</p>
            </div>
          </div>
          <div class="contact-form" id="contact-form">
            <div class="contact-form-space"></div>
            <h2>お問い合わせ</h2>
            <p class="contact-explanation">参加の要望や質問など、下記のフォームからお気軽にお問い合わせください。</p>
              <?php if( $mode == 'input' ){ ?>
                <?php
                  if( $errmessage ){
                    echo '<div style="color:red;">';
                    echo implode('<br>', $errmessage );
                    echo '</div>';
                  }
                <form action="./index.php" method="post">
                  <div class="contact-name">
                    <p>お名前</p>
                    <input class="contact-input contact-input-name" type="text" name="fullname" value="<?php echo $_SESSION['fullname'] ?>">
                  </div>  
                  <div class="contact-email">
                    <p>メールアドレス</p>
                    <input class="contact-input contact-input-email" type="email"   name="email"    value="<?php echo $_SESSION['email'] ?>">
                  </div>
                  <div class="contact-message">
                    <p>お問い合わせ内容</p>
                    <textarea class="contact-input contact-input-message" cols="40" rows="8" name="message"><?php echo $_SESSION['message'] ?></textarea>
                  </div>
                  <a href="#mobile-contact">
                    <input class="contact-btn" type="submit" name="confirm" value="送信" />
                  </a>
                </form>
              <?php } ?>
            
          </div>
          <div class="footer">
            <p>Copyright ©Glocal Creative Career All rights Reserved.</p>
          </div>
        </div>
      </div>
    </main>
    <script src="./script.js"></script>
  </body>
</html>