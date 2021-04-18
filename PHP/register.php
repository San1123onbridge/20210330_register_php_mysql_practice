<?php    
    require_once('config.php');
    
    $ac = "";
    $pw = "";
    $re_pw ="";

    $trim_ac = "";
    $trim_pw = "";
    $trim_repw = "";
    
    $ac_err = "";
    $pw_err = "";
    $re_pw_err = "";    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //驗證ac
        if( empty(trim($_POST['reg_ac'])) ){
            $ac_err = "Enter your reg_ac.";
            print "$ac_err";
        }else{
            $query = "SELECT user_ac FROM users_ac_pw WHERE user_ac = :ac";
            if($stmt = $db->prepare($query)){
                $trim_ac = trim($_POST['reg_ac']);
                $stmt->bindParam(":ac", $trim_ac, PDO::PARAM_STR);
                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        $ac_err = "Your ac: $trim_ac is already token.";
                        print "$ac_err";
                    }else{
                        $ac = trim($_POST['reg_ac']);
                    }
                }
            }else{
                print "Something got wrong. Pls try again.";
            }
        unset($stmt);
        }

        //驗證pw
        if( empty(trim($_POST['reg_pw'])) ){
            $pw_err = "Enter your reg_pw";
            print "$pw_err";
        }else if( strlen(trim($_POST['reg_pw'])) <6 ){
            $pw_err = "Need at least 6 numbers";
            print "$pw_err";
        }else{
            $trim_pw = trim($_POST['reg_pw']);
        }
        
        //驗證re_pw
        if( empty(trim($_POST['reg_repw'])) ){
            $re_pw_err = "Pls confirm your pw.";
            print "$re_pw_err";
        }else{
            $trim_repw = trim($_POST['reg_repw']);
        }
        if( empty($pw_err) && (trim($_POST['reg_pw']) != trim($_POST['reg_repw'])) ){
            $pw_err = "The pw didnt match up.";
            print "$pw_err";
        }

        //insert進資料庫
        if( empty($ac_err) && empty($pw_err) && empty($re_pw_err)){
            $query = "INSERT INTO users_ac_pw (user_ac, user_pw)
                      VALUES (:ac, :pw)";
            if($stmt = $db->prepare($query)){
                $stmt->bindParam(":ac", $trim_ac, PDO::PARAM_STR);
                $stmt->bindParam(":pw", $trim_pw, PDO::PARAM_STR);
                $trim_pw = password_hash("$trim_pw",PASSWORD_DEFAULT);

                if($stmt->execute()){
                    print "Sign up completely.";
                }else{
                    print "Something got wrong. Pls try again.";
                }
            }
            unset($stmt);
        }
        unset($db);        
    }
    


?>