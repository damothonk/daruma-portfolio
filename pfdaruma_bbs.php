<?php
    // SQLのワイルドカードをエスケープ
	function escapeString($s){
		return "%" . mb_ereg_replace('([_%#])', '#\1', $s) . "%";
	}

	// サニタイズ処理
	function e($str){
		return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
	}

	//GETデータの取得
	$keyword = '';
	if(isset($_GET['keyword']) && $_GET['keyword'] !== ''){
		$keyword = $_GET['keyword'];
	}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">
        <title>Daruma Portfolio BBS</title>
        <link href="./pfstyle_pc.css" rel="stylesheet" media="screen and (min-width : 960px)">
        <link href="./pfstyle_mobile.css" rel="stylesheet" media="screen and (max-width : 959px)">
        <link rel="icon" type="image/png" href=""><!--最後ファビコンの設定-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="./pfdaruma.js"></script>
     </head>
    
    <body>

        <div class="background" id="background">

            <header>
                <h1 class="title" id="title">Daruma's Portfolio</h1>
                <div class="clear"></div>
            </header>

            <div id="menuBtn" class="menuBtn">
                    <div class="menuBtn_Bar"></div>
                    <div class="menuBtn_Bar"></div>
                    <div class="menuBtn_Bar"></div>
                    <div class="menuBtn_Bar"></div>
            </div>

            <nav class="menu" id="menu">
                <ul class="menu_area" id="menu_area">
                    <li><a class="menu_header" href="./index.html">TOP</a></li>
                    <li><a class="menu_header" href="./pfdaruma_profile.html">PROFILE</a></li>
                    <li><a class="menu_header" href="./pfdaruma_skills.php">SKILL&WORKS</a></li>
                    <li><a class="menu_header" href="./pfdaruma_bbs.php">BBS</a></li>
                </ul>
            </nav>

            <main>
                <div class="subTitles" id="bbs_post_head">
                    <h2>掲示板</h2>
                    <span class="subTitles" id="bbs_subTitle">BBS</span>
                </div>

                <section>

                    <!--bbsPost-->
                    <div id="bbs_post">
                        <div id="bbs_post_chil">
                            <img class="mkImgs" src="./img/ikonate/ikonate_write/svg/dashboard.svg" alt="書き込み欄">
                            <h3>書き込み欄</h3>
                        </div>
                        <div id="buttonMks">
                            <img class="mkImgs" src="./img/ikonate/ikonate_off/svg/switch-off.svg" alt="off">
                        </div>
                    </div>

                    <!--bbsInputs-->
                    <div id="input1" class="inputs">

                        <!--新規チェック-->
                        <label>
                            <input type="checkbox" name="newUser" value="1" checked="checked">
                            "新規"
                        </label>

                        <!--投稿者名-->
                        <input type="text" name="postName" size="12" placeholder="投稿者名">
                        <select id="" class="" required>
                            <option value="">さん</option>
                            <option value="">氏</option>
                            <option value="">殿</option>
                        </select>

                        <!--本文-->
                        <textarea cols="15" rows="2" name="message" placeholder="本文"></textarea>

                        <!--画像アップロード-->
                        <label class="imgFile">
                            <span>"画像のアップロード"</span>
                            <input name="picture" type="file">
                        </label>

                        <!--送信ボタン-->
                        <form method="post" action="">
                            <input type="submit" value="書き込む">
                        </form>
                    </div>

                </section>

                <section>

                </section>

            </main>

            <footer>
                <ul class="" id="">
                    <li><a class="menu_foot" href="./index.html">TOP</a></li>
                    <li><a class="menu_foot" href="./pfdaruma_profile.html">PROFILE</a></li>
                    <li><a class="menu_foot" href="./pfdaruma_skills.php">SKILL&WORKS</a></li>
                    <li><a class="menu_foot" href="./pfdaruma_bbs.php">BBS</a></li>
                </ul>
            </footer>

        </div>

    </body>

    <!--error_Failed to create chart: can't acquire context from the given item_対策-->
    <div id="bgGraph" style="display: none;">
        <canvas class="chart" id="profile_chart"></canvas>
    </div>
    
</html>