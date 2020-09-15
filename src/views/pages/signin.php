<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login - DevsBook</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base;?>/login">

            <?php if( !empty($flash) ): ?>
                <div class="flash"><?php echo $flash ?></div>
            <?php endif; ?>

            <input placeholder="Email address" class="input" type="email" name="email" />

            <input placeholder="Password" class="input" type="password" name="password" />

            <input class="button" type="submit" value="Sign in" />

            <a href="<?=$base;?>/register">New to DevsBook? Create an account.</a>
        </form>
    </section>
</body>
</html>