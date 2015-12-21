<!DOCTYPE HTML>
<html>
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <title>Login - ICS</title>

        <?php foreach ($js as $file) { ?>
        <script type="text/javascript" src="<?php echo $file; ?>"></script>
        <?php } ?>
        
        <?php foreach ($css as $file) { ?>
        <link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" />
        <?php } ?>
        
        
        

    </head>
    <body onload="jsAsync.init();">
        <div class="auth">
            
<div class="login">
    <div class="logo">
        <img src="/img/logo-auth.png">
    </div>
    <div class="form">
        <form method="post">
            <input type="text" name="user_email" placeholder="Почта" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup"><br>
            
            <input type="password" name="user_password" placeholder="Пароль" value="" class="jsOnFocusin jsOnFocusout jsOnKeyup"><br>
            
            <input type="submit" name="user_submit" value="Войти">
        </form>
    </div>
    <?php if ($messages) { ?>
        <div class="login-message">
            <?php foreach ($messages as $item) { ?>
            <div class="alert <?php echo $item['class']; ?>">
                <?php echo $item['text']; ?>
            </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>


        </div><!--.main-->
    </body>
</html>