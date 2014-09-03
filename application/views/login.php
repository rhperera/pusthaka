

<span href="#" class="button" id="toggle-login">Log in</span>

<?php
        if($error==1)
        {
            echo '<p>username / password did not match</p>';
        }
?>

<div id="login">
    <div id="triangle"></div>
    <h1>Log in</h1>
    <form action ="<?php base_url()?>login" method="post">
        <input type="text" name="user_name" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <input type="submit" value="Login" />
    </form>
</div>
