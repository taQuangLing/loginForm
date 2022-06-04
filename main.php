<?php
require_once('db/DBHelper.php');
require_once('ulis/utility.php');
    
    // if (isset($_COOKIE['login']) && $_COOKIE['login'] == 'true'){
    //     header('Location: user2.php');
    //     die();
    // }

    $data = validationToken();
    if ($data != NULL){
        header('Location: user2.php');
        die();
    }

    $name = $email = $password = $job = $age = $sex =  $status = '';
    

    if (!empty($_POST)){
        
        if (isset($_POST['submit'])){
            $submit = $_POST['submit'];
        
            if ($submit == "Sign up"){
                if (    (isset($_POST['name'])) && (!empty($_POST['name']))
                        && (isset($_POST['password'])) && (!empty($_POST['password']))
                        && (isset($_POST['email'])) && (!empty($_POST['email']))
                        && (isset($_POST['age'])) && (!empty($_POST['age']))
                        && (isset($_POST['sex'])) && (!empty($_POST['sex']))
                        && (isset($_POST['job'])) && (!empty($_POST['job']))
                        ){
                    $name = $_POST['name'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $age = $_POST['age'];
                    $sex = $_POST['sex'];
                    $job = $_POST['job'];
                    $password = getPwdSecurity($password); 

                    $sql = "insert into user (name,email,password, age, sex, job) values ('$name', '$email', '$password', $age, '$sex', '$job');";
                    execute($sql);
                    $status = "Sign_in"; // Chuyen sang trang thai dang nhap
                   
                }
              
                
            }
            else 
            if ($submit == "Sign in"){
                if((    isset($_POST['email'])) && (!empty($_POST['email']))
                        && (isset($_POST['password'])) && (!empty($_POST['password']))
                        ){
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $password = getPwdSecurity($password);

                    $sql = "select email from user where email = '$email' and password = '$password';";
                    $data = executeResult($sql);
                    if ($data != null && count($data) > 0){
                        // setcookie('login', 'true', time() +  7*24*60*60, '/');
                        $token = getPwdSecurity($data[0]['email'].time());
                        setcookie('token', $token, time() + 7*24*60*60, '/');

                        $sql = "update user set token = '$token' where email = '".$data[0]['email']."';";
        
                        execute($sql);
                        header('Location: user2.php');
                    }
                    else
                    $status = "Sign_in";
                }
                
            }
        }
       
    }       

?>


<html>
    <head>
        <script src="check.js"></script>
        <link rel="stylesheet" href="background.css" type="text/css">
    </head>
    <title>Sign in/Sign up</title>
    <body>
        
        <div id="conteiner">
            <div class="top">
                <div class="top_left">
                    <button class="sign_up" id="sign_up" value="sign_up" onclick="change_status_sign_up()">
                        <span id="sign_up_t">Sign up</span>
                    </button>     
                    <button class="sign_in" id="sign_in" onclick="change_status_sign_in()">
                        <span id="sign_in_t">Sign in</span>
                    </button>
                </div>
            </div>

        <div id="form1">
            <form name="sign_up" method="POST" onsubmit="return check_sign_up()">
                <div class="body">
                    <div class="body_child">    
                        <div class="header">
                            <span>ĐĂNG KÍ THÀNH VIÊN</span>
                        </div>

                        <div class="information">
                        <div class="name">
                            <div id="in4">Name</div>
                            <input type="text" name="name" value="" placeholder="Nguyen Van A" onblur="check_space('name')"/>
                            <div class="vx"><span id="name"></span></div>
                        </div>
                        <div class="password">
                            <div id="in4">Password</div>
                            <input type="password" name="password" value="" onblur="check_space('password')"/>
                            <div class="vx"><span id="password"></span></div>
                        </div>
                        <div class="password Confirm">
                            <div id="in4">Password confirm</div>
                            <input type="password" name="passwordConfirm" value="" onblur="check_space('passwordConfirm')"/>
                            <div class="vx"><span id="passwordConfirm"></span></div>
                        </div>
                        <div class="email">
                            <div id="in4">Email</div>
                            <input type="email" name="email" placeholder="xxx@gmail.com" onblur="check_space('email')"/>
                            <div class="vx"><span id="email"></span></div>
                        </div>
                        <div class="job">
                            <div id="in4">Job</div>
                            <input type="text" name="job" placeholder="Engineer" onblur="check_space('job')"/> 
                             <div class="vx"><span id="job"></span></div>
                        </div>
                        <div class="age">
                            <div id="in4">Age</div>
                            <input type="text" name="age" placeholder="18 to 40" onblur="check_space('age')"/>
                            <div class="vx"><span id="age"></span></div>
                        </div>
                        <div class="sex">
                            <div id="in4">Sex</div>
                            <div id="radio">
                                <input type="radio" name="sex" value="Nam"/>Man
                                <input type="radio" name="sex" value="Nu"/>Women
                            </div>
                        </div>
                        </div>
                        <div class="dang_ky">
                            <input type="submit" value="Sign up" name="submit"/>
                        </div>
                    </div> 
                </div>
            </form>
            <div class="chu_thich">
                <span>Bạn đã có tài khoản?<button id="ki_nhap" onclick="change_status_sign_in()">Đăng nhập</button></span>
            </div>
        </div>
        <div  id="form2">
            <form name="sign_in" method="POST">
                <div class="body">
                    <div class="body_child">
                        <div class="header">
                            <span>ĐĂNG NHẬP</span>
                        </div>
                        <div class="information">
                            <div class="email">
                                <div id="in4">Email</div>
                                <input type="text" id="email" value="" name="email"/>
                            </div>
                            <div class="password">
                                <div id="in4">Password</div>
                                <input type="password" id="password" value="" name="password">
                            </div>
                            <div class="memorize">
                                <div id="in4"></div>
                                <input type="checkbox" name="memory" value="">Ghi nhớ lần sau
                            </div>
                            <div class="forgot_password">
                                <div id="in4"></div>
                                <a href="abc.php">Quên mật khẩu</a>
                            </div>
                        </div>
                        <div class="dang_nhap">
                            <input type="submit" value="Sign in" name="submit">
                        </div>
                        
                    </div>
                </div>
            </form>
            <div class="chu_thich">
                <span>Bạn chưa có tài khoản? Vui lòng<button id="ki_nhap" onclick="change_status_sign_up()">Đăng kí</button></span>
            </div>
        </div>
        <script>
            var stt = "<?php echo $status;?>"
            if (stt == "Sign_in")change_status_sign_in();
        </script>
        </div>
        
    </body>
</html>