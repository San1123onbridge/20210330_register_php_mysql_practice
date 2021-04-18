<?php
    require_once('config.php');
    $ac = "";
    $pw = "";
    $ac_err = "";
    $pw_err = "";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //驗證ac是否為空
        if( empty(trim($_POST['sign_ac'])) ){
            $ac_err = "Enter your ac.";
            print "$ac_err";
        }else{
            $ac = $_POST['sign_ac'];
            $trim_ac = trim($ac);
        }

        //驗證pw是否為空
        if( empty(trim($_POST['sign_pw'])) ){
            $ac_err = "Enter your pw.";
            print "$ac_err";
        }else{
            $pw = $_POST['sign_pw'];
            $trim_pw = trim($pw);
        }

        //驗證ac是否於資料庫，是則驗證密碼，否則回報帳號未於資料庫
        if( empty($ac_err) && empty($pw_err) ){
            $query = "SELECT user_ac, user_pw FROM users_ac_pw WHERE user_ac = :ac";
            
            if($stmt = $db->prepare($query)){
                $stmt->bindParam(":ac", $trim_ac, PDO::PARAM_STR);

                if($stmt->execute()){
                    if($stmt->rowcount() == 1){
                        if($row = $stmt->fetch()){
                            $ac = $row["user_ac"];
                            $pw_hash = $row["user_pw"];
                            if(password_verify($pw,$pw_hash)){
                                print "Logging in successful.";
                            }else{
                                $pw_err = "Wrong pw.";
                                print "$pw_err";
                            }
                        }
                    }else{
                        $ac_err = "Your ac is not in the database.";
                        print "$ac_err";
                    }
                }
            }else{
                print "Something got wrong. Pls try again.";
            }
        }

    }
    
?>