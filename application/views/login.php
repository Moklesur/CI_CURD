<h2>Login Form!</h2>
<?php if($error == 1) {?>
<p>your password & usernem doesn't mass.</p>
<?php } ?>
<form action="<?= base_url()?>ci_post/login/" method="post">
    <p>Username: <input type="text" name="username" /></p>
    <p>Pssword: <input type="password" name="password" ></p>
    <p>Go for login : <input type="submit" name="Submit" ></p>
</form>
