<?php
    //初期化
    $newUser = ''; //新規
    $postName = ''; //投稿者名
    $subName = ''; //名前サブ
    $delPass = ''; //削除
    $mes = ''; //本文
    $picture = ''; //画像アップ

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

    try{

        //DB接続
        require_once('DBinfo.php');
        $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBInfo::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //SQL準備
        $sql = '';
        $stat = $pdo->prepare($sql);

        //パラメータセット

        //トランザクション開始
        $pdo->beginTransaction();

        //SQL発行
        $stat->execute();

        //コミット
        $pdo->commit();
        
    }catch(PDOException $e){

    }finally{

       //DB切断
       $pdo = NULL; 
    }

    //BBSリダイレクト
    header('location:pfdaruma_bbs.php');
    exit();