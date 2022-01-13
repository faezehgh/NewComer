<?php
//start session
session_start();
//load and initialize user class
include 'users.php';
$user = new User();
if(isset($_POST['signupSubmit'])){
    //check whether user details are empty
    if(!empty($_POST['prénom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['matricule'])){
        //matricule and confirm matricule comparison
        if($_POST['matricule'] !== $_POST['confirm_matricule']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm matricule must match with the matricule.'; 
        }else{
            //check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getRows($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists, please use another email.';
            }else{
                //insert user data in the database
                $userData = array(
                    
                    'nom'          => $_POST['nom'],
                    'prénom'       => $_POST['prénom'],
                    'email'        => $_POST['email'],
                    'matricule'    => md5($_POST['matricule']),
                    'domaine'      => $_POST['domaine'],
                    'hiérarchique' => $_POST['hiérarchique'],
                    'poste'        => $_POST['poste'],
                    'dateArrivée'  => $_POST['dateArrivée'],
                    'dateSortie'   => $_POST['dateSortie']
                );
                $insert = $user->insert($userData);
                //set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have registered successfully, login with your credentials.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store signup status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'Registration.php':'Registration.php';
    //redirect to the home/registration page
    header("Location:".$redirectURL);
}elseif(isset($_POST['loginSubmit'])){
    //check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['matricule'])){
    	 //get user data from user class
        $conditions['where'] = array(
            'email' => $_POST['email'],
            'matricule' => md5($_POST['matricule']),
            'status' => '1'
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
        //set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['ID'];
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'Welcome '.$userData['prénom'].'!';
            //store login status into the session
            $_SESSION['sessData'] = $sessData;
            //redirect to the home page
            header("Location:index.php");
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Wrong email or matricule, please try again.'; 
            
            $_SESSION['sessData'] = $sessData;
            //redirect to the home page
            header("Location:login.php");
           
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email and matricule.'; 
    }
    

}elseif(isset($_POST['forgotSubmit'])){
    //check whether email is empty
    if(!empty($_POST['email'])){
        //check whether user exists in the database
        $prevCon['where'] = array('email'=>$_POST['email']);
        $prevCon['return_type'] = 'count';
        $prevUser = $user->getRows($prevCon);
        if($prevUser > 0){
            //generat unique string
            $uniqidStr = md5(uniqid(mt_rand()));;
            
            //update data with forgot pass code
            $conditions = array(
                'email' => $_POST['email']
            );
            $data = array(
                'forgot_pass_identity' => $uniqidStr
            );
            $update = $user->update($data, $conditions);
            
            if($update){
                $resetPassLink = 'http://localhost/resetPassword.php?fp_code='.$uniqidStr; 
                
                //get user details
                $con['where'] = array('email'=>$_POST['email']);
                $con['return_type'] = 'single';
                $userDetails = $user->getRows($con);
                
                //send reset matricule email
                $to = $userDetails['email'];
                $subject = "Matricule Update Request";
                $mailContent = 'Dear '.$userDetails['first_name'].', 
                <br/>Recently a request was submitted to reset a matricule for your account. If this was a mistake, just ignore this email and nothing will happen.
                <br/>To reset your matricule, visit the following link: <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                <br/><br/>Best Regards';
              
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: test<sender@example.com>' . "\r\n";
                //send email
                mail($to,$subject,$mailContent,$headers);
                
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Veuillez vérifier votre e-mail, nous avons envoyé un lien de <br> réinitialisation de matricule à votre e-mail enregistré.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
            }
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Given email is not associated with any account.'; 
        }
        
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email to create a new matricule for your account.'; 
    }
    //store reset matricule status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the forgot pasword page
    header("Location:forgotPassword.php");
}elseif(isset($_POST['resetSubmit'])){
    $fp_code = '';
    if(!empty($_POST['matricule']) && !empty($_POST['confirm_matricule']) && !empty($_POST['fp_code'])){
        $fp_code = $_POST['fp_code'];
        //matricule and confirm matricule comparison
        if($_POST['matricule'] !== $_POST['confirm_matricule']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm matricule must match with the matricule.'; 
        }else{
            //check whether identity code exists in the database
            $prevCon['where'] = array('forgot_pass_identity' => $fp_code);
            $prevCon['return_type'] = 'single';
            $prevUser = $user->getRows($prevCon);
            if(!empty($prevUser)){
                //update data with new matricule
                $conditions = array(
                    'forgot_pass_identity' => $fp_code
                );
                $data = array(
                    'matricule' => md5($_POST['matricule'])
                );
                $update = $user->update($data, $conditions);
                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Your account matricule has been reset successfully. Please login with your new matricule.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'You does not authorized to reset new matricule of this account.';
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store reset matricule status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'login.php':'resetPassword.php?fp_code='.$fp_code;
    // redirect to the login/reset matricule page
    header("location:".$redirectURL);

    }elseif(!empty($_REQUEST['logoutSubmit'])){
    //remove session data
    unset($_SESSION['sessData']);
    session_destroy();
    //store logout status into the ession
    $sessData['status']['type'] = 'success';
    $sessData['status']['msg'] = 'You have logout successfully from your account.';
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
    header("Location:login.php");
}else{
    //redirect to the home page
    header("Location:login.php");
}


