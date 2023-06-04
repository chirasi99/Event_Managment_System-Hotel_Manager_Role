<?php

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        session_start() ;

        // if (isset($_SESSION['SESSION_EMAIL'])) {
        //     header("Location: hotel-manager-home.php");                  defaul go to the home page of hotel manager when successfully registered
        //     die();
        // }

        //Load Composer's autoloader
        require 'vendor/autoload.php';


        include 'config.php';
        $displaymessage = "";

        if (isset($_POST['submit'])){
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $bussiness_id = mysqli_real_escape_string($conn, $_POST['bussinessId']);
                $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
                $district = mysqli_real_escape_string($conn, $_POST['district']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
                $accountno = mysqli_real_escape_string($conn, $_POST['accountno']);
                $accountname = mysqli_real_escape_string($conn, $_POST['accountname']);
                $bank = mysqli_real_escape_string($conn, $_POST['bank']);
                $branchcode = mysqli_real_escape_string($conn, $_POST['branchcode']);
                $verification_code = mysqli_real_escape_string($conn, substr(number_format(time() * rand(), 0, '', ''), 0, 6));

                $validfname = preg_match("/^[a-zA-Z \s]+$/", $fname);
                $validlname = preg_match('/^[a-zA-Z \s]+$/', $lname);
                $validcontactno = preg_match('/^[0-9]{3}-[0-9]{7}$/', $contactno);
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if(!$validfname){
                    $displaymessage = "Enter valid first name";
                }
                elseif(!$validlname){
                    $displaymessage = "Enter valid last name";
                }
                elseif(!$validcontactno){
                    $displaymessage = "Enter valid contact number";
                    
                }
                elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
                    $displaymessage = "Password should be at least 8 characters in length and should include at least one upper case letter, 
                                        one number, and one special character.";
                }
               
                else {    
                if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
                    $displaymessage = "{$email} - This email address has been already exists.";
                } else {
                        $password = md5($password);
                        $confirm_password = md5($confirm_password);

                            if ($password === $confirm_password) {
                                $sql = "INSERT INTO users (bussiness_id, fname,lname, email,contactno,district, password, account_no, account_name, bank, branch_code, verification_code, email_verified_at, email_status)
                                VALUES ('{$bussiness_id}','{$fname}', '{$lname}','{$email}','{$contactno}','{$district}', '{$password}','{$accountno}', '{$accountname}', '{$bank}', '{$branchcode}', '{$verification_code}', 'NULL','NULL')";
                                $result = mysqli_query($conn, $sql);


                                if ($result) {
                                    $_SESSION['verify_code']= $verification_code;
                                    $_SESSION['mail'] = $email;
                                    $_SESSION['upassword'] = $password;
                                    $_SESSION['bussiness_reg_id']= $bussiness_id;
                                    
                                    //Create an instance; passing `true` enables exceptions
                                    $mail = new PHPMailer(true);
                
                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        $mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = '2020cs197@stu.ucsc.cmb.ac.lk';                     //SMTP username
                                        $mail->Password   = '20001975';                               //SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                                        //Recipients
                                        $mail->setFrom('2020cs197@stu.ucsc.cmb.ac.lk');
                                        $mail->addAddress($email);
                
                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'Email Verification';
                                        $mail->Body    = 'Your verification code is : <b style="font-size:15px;">' . $verification_code. '</b>';
                
                                        $mail->send();
                                        echo 'Message has been sent';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                    
                                    header('location: OTP-verification.php');
                                } else {
                                    $displaymessage= "Something wrong went.";
                                }
                            } else {
                                $displaymessage = "Password and Confirm Password do not match";
                            }
                        }

                
            
                }

                }
            ?>
            

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up - Hotel Manager</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/headers.css">

</head>

<body>
 
    <?php include('header-1.php')?>  

        <div class="MainBody">
                <div class="picContainer">
                        <img class="SignupPic" src="./assets/Sign up.gif" alt="SignUp Image">
                </div>
                <div class="formContainer">
                        <form class="formDetails" method="post" autocomplete="">
                                <h4>SIGN UP</h4>
                                <?php echo "<p style='color:white; background-color:red; padding-left:5px; margin-top: -13px;'>" . $displaymessage . "</p>"; ?>

                                <p><b>Personal Details</b></p>
                                <label for="fname">First Name<em>*</em></label>
                                <input type="text" name="fname" required value="<?php if (isset($_POST['submit'])) { echo $fname; } ?>">

                                <label for="lname">Last Name<em>*</em></label>
                                <input type="text" name="lname"  required value="<?php if (isset($_POST['submit'])) { echo $lname; } ?>" >

                                <label for=" email">Email<em>*</em></label>
                                <input type="email" name="email" required value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" >

                                <label for="bussinessId">Bussiness Registratio ID<em>*</em></label>
                                <input type="text" name="bussinessId" required value="<?php if (isset($_POST['submit'])) { echo $bussiness_id; } ?>" >

                                <label for="contactno">Contact No<em>*</em></label>
                                <input type="phone" name="contactno"  required value="<?php if (isset($_POST['submit'])) { echo $contactno; } ?>">

                                <label for="district">District<em>*</em></label>
                                <input type="text" name="district"  required value="<?php if (isset($_POST['submit'])) { echo $district; } ?>">

                                <label for="password">Password<em>*</em></label>
                                <input type="password" name="password" required>

                                <label for="confirmpassword">Confirm Password<em>*</em></label>
                                <input type="password" name="confirmpassword" required>

                                <p><b>Account Details</b></p>
                                <label for="accountno">Account No<em>*</em></label>
                                <input type="text" name="accountno" required>

                                <label for="accountname">Account Name<em>*</em></label>
                                <input type="text" name="accountname" required>

                                <label for="bank">Bank<em>*</em></label>
                                <input type="text" name="bank" required>

                                <label for="branchcode">Branch Code<em>*</em></label>
                                <input type="text" name="branchcode" required>

                                <button class="SignupButton" name="submit">Sign Up</button>
                                <p>or Already have an Account? <a href="./login.php">Sign In </a>
                                </p>

                        </form>
                </div>
        </div>
</body>

</html>