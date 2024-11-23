 <section id="visitor">
     <p>
         WebExamen est une plateforme en ligne conçue pour permettre aux étudiants de passer leurs examens en toute sécurité et simplicité.
         Notre mission est de fournir un espace sécurisé et convivial pour que chaque étudiant puisse démontrer ses compétences sans contraintes techniques.
     </p>
     <p>Avec WebExamen version 1, vous pouvez :</p>
     <ul>
         <li>Crée des questions pour vos futurs examens</li>
     </ul>
     <p>
         Nous nous engageons à vous offrir la meilleure expérience possible afin de réussir vos examens en toute confiance.
     </p>
     <a href="/index.php?action=Inscription">Inscription / Connexion</a>
     <a href="/index.php?action=Connexion">Fast Connexion</a>
     <?php if(isset($_GET['message'])) {
         ?><p style='display: flex; align-items: center; justify-content: center; color: #ff0000; font-weight: bold;' id="message-formulaire"><?= json_encode($_GET['message'], JSON_UNESCAPED_UNICODE); ?></p><?php
     }
     ?>
 </section>