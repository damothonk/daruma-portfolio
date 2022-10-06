<?php
    //初期化
    $newUser = ''; //新規
    $postName = ''; //投稿者名
    $subName = ''; //名前サブ
    $delPass = ''; //削除
    $mes = ''; //本文
    $images = ''; //画像アップ

    //現在日時の取得
    $datetime = date('Y-m-d H:i:s');

    //フォームから値を取得
    if(isset($_POST['postName']) && $_POST['postName'] !== ''){
        $postName = $_POST['postName'];
    }
    if(isset($_POST['subName']) && $_POST['subName'] !== ''){
        $subName = $_POST['subName'];
        switch($subName){
            case 'san':
                $subName = 'さん';
                break;
            case 'shi':
                $subName = '氏';
                break;
            case 'dono':
                $subName = '殿';
                break;
        }
    }
    if(isset($_POST['mes']) && $_POST['mes'] !== ''){
        $mes = $_POST['mes'];
    }
    //画像ファイル取得(後で方法を確認・検索)
    if(isset($_POST['images']) && $_POST['images'] !== ''){
        $images = $_POST['images'];
    }

    try{

        //DB接続
        require_once('DBinfo.php');
        $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBInfo::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //SQL準備
        $sql = 'INSERT INTO portfolio_bbs(date, postName, subName, message, image) VALUES(:date, :postName, :subName, :mes, :img)';
        $stat = $pdo->prepare($sql);

        //パラメータセット
        $stat->bindValue(':date', $datetime);
        $stat->bindValue(':postName', $postName);
        $stat->bindValue(':subName', $subName);
        $stat->bindValue(':mes', $mes);
        $stat->bindValue(':img', $images);

        //トランザクション開始
        $pdo->beginTransaction();

        //SQL発行
        $stat->execute();

        //コミット
        $pdo->commit();
        
    }catch(PDOException $e){
        
        //$pdoがセットされていてトランザクション中ならロールバック
        if(isset($pdo) && $pdo->inTransaction()){
            $pdo->rollBack();
            echo 'ロールバックしました。<br>';
        }

        //エラー情報の表示
        $errCode = $e->getCode();
        $errMessage = $e->getMessage();
        echo "{$errCode} / {$errMessage}<br>";

        //処理終了
        die('書き込みに失敗しました。<br>');

    }finally{

       //DB切断
       $pdo = NULL; 
    }

    //BBSリダイレクト
    header('location:pfdaruma_bbs.php');
    exit();