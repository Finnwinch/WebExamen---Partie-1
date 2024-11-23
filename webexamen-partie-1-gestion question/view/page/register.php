<section id="acces">
    <form action="/model/context/register.php" method="post" class="register">
        <input type="text" name="username" placeholder="nom d'utilisateur" required>
        <input type="text" name="courriel" placeholder="Courriel" required>
        <input type="password" name="password" placeholder="mot de passe"required>
        <input type="password" name="passwordcheck" placeholder="confirmer mot de passe" required>
        <input type="submit" value="Register" id="register">
    </form>
    <form action="/model/context/login.php" method="post" class="login">
        <input type="text" name="username" placeholder="nom d'utilisateur" required>
        <input type="password" name="password" placeholder="mot de passe" required>
        <input type="submit" value="login" id="loginer">
    </form>
    <div class="loginButton">
        <button onclick="ShowLogin('Tu as déjà un compte chez nous? wow')">Login</button>
    </div>
    <div class="RegisterButton" style="display: none;">
        <button onclick="ShowRegister('Tu veux un compte chez nous? Je te comprend')">Register</button>
    </div>
    <p style='display: flex; align-items: center; justify-content: center; color: #ff0000; font-weight: bold;' id="message-formulaire"></p>
</section>
<script src="../../script/toggleMenuConnection.js">
</script>
<script>
    <?php
    if (isset($_GET['focus'])) {
    ?>
    ShowLogin("Vous devez vous reconnecter, la session a disparu !");
    <?php
    } else {
    ?>
    ShowRegister("Un compte chez nous, c'est très bien pour nous utilisez :0");
    <?php
    }
    ?>

    <?php
        if (isset($_GET['ErrorRegister'])) {
            ?> ShowRegister(<?= json_encode($_SESSION['message'] ?? "", JSON_UNESCAPED_UNICODE); ?>); <?php
        } else {
            if (isset($_GET['ErrorConnect'])) {
                ?> ShowLogin(<?= json_encode($_SESSION['message'] ?? "", JSON_UNESCAPED_UNICODE); ?>); <?php
            }
        }
    ?>

</script>
