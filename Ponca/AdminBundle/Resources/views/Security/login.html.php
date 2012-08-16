<html>
    <header>
         <link rel="stylesheet" type="text/css" media="screen" href="/css/style.css" />
    </header>
<body>
<div class="center"><div class="login"> 
        <?php if ($error): ?>
            <div><?php echo $error->getMessage() ?></div>
        <?php endif; ?>
            
        <form action="<?php echo $view['router']->generate('login_check') ?>" method="post" name="kks2">
            <label for="username">Username:</label>
            <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />
            <br /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="_password" />
            <!-- <br /><br />
            <label for="remember_me">&nbsp;</label>
            <input type="checkbox" id="remember_me" name="_remember_me" /> Keep me logged in
            -->
            <br /><br />
            <!--
                If you want to control the URL the user is redirected to on success (more details below)
                <input type="hidden" name="_target_path" value="/account" />
            -->
            <label>&nbsp;</label>
            <button type="submit">login</button>
        </form>
</div></div>
    
</body></html> 
