<html>
    <head>
        <title>Login Page</title>
        <style>
            *{color:white;}
            body{background: linear-gradient(#0f0c29,#302b63,#24243e); padding:20px; font-size:20px;}
        </style>
    </head>
    <body>
    <?php
        if(!$_SERVER["REQUEST_METHOD"]==="POST"){
            die("SERVER ERROR!!");
        }
        $username = $_POST["Email"];
        $password = $_POST["Password"];
        $file=fopen("data.txt","r");
        $f=1;
        while($line=fgets($file)){
            list($id,$pwd)=explode(":",$line);
            if(trim($id)===trim($username) && trim($pwd)===trim($password)){
                $f=0;
                echo "Hello ". explode('@',$username)[0]." nice to meet you.<br><br>Welcome Back!!";
                break;
            }
        }
        fclose($file);
        if($f){
            header("location:form.html?error=101");
         }
    ?>
    </body>
</html>
