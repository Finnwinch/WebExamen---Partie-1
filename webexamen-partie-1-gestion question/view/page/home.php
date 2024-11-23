<?php
include_once __DIR__ . '/../../service/SQuestion.php' ;
if (!WebMaster::sessionIsValid()) {
    WebMaster::redirectionToIndexWithActionKey("Inscription&focus") ;
} else {
    ?>
    <section id="home">
        <div id="formulaireAccountOperation">
            <form action="/model/context/delete.php" method="post" id="deleteForm" style="display: none;">
                <input type="text" name="usernameDel" id="usernameDel" placeholder="username">
                <input type="password" name="passwordDel" id="passwordDel" placeholder="password">
                <input type="submit" value="Delete" id="delete">
            </form>
            <button id="toggleDeleteForm">Delete</button>
            <form action="/model/context/disconnect.php" method="post" id="disconnectForm" style="margin-left: 4px;">
                <input type="submit" value="Disconnected" id="disconnected">
            </form>
        </div>
        <script src="/script/toggleMenuDelete.js"></script>
        <script src="/script/QuestionManager.js"></script>
        <?php
        WebMaster::sessionGet();
        if ($_SESSION['Compte']->getType() != TypeAccount::admin) {
            die() ;
        }
        ?>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Opération</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach (SQuestion::getQuestions() as $questionObject) {
                ?>
                <tr>
                    <td ><?php echo $questionObject->getId() ?></td>
                    <td id="question-text-<?php echo $questionObject->getId(); ?>"><?php echo $questionObject->getQuestion() ?></td>
                    <td>
                        <button onclick="toggleEdit(<?php echo $questionObject->getId(); ?>)">Update</button>
                        <button onclick="deleteQuestion(<?php echo $questionObject->getId(); ?>)">Delete</button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <button onclick="createQuestion()">Create</button>
    </section>
    <?php
}
?>
