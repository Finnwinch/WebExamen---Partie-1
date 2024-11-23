<header>
    <nav>
        <a href="/index.php?action=Visitor" id="titleProject">WebExamen</a>
        <p id="username-display-welcome">Bonjour,
            <span id="username-display-username"></span>
        </p>
    </nav>
</header>

<script>
    <?php
    if (WebMaster::sessionIsValid()) {
    ?>document.getElementById("username-display-welcome").style.display = "flex";
    window.onload = function() {
        document.getElementById("username-display-username").innerText = <?php echo json_encode($_SESSION['Compte']->getUsername(), JSON_UNESCAPED_UNICODE); ?>;
    };
    <?php
    } else {
        ?>document.getElementById("username-display-welcome").style.display = "none";<?php
    }
    ?>
</script>