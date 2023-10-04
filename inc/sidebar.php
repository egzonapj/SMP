<?php
if (isset($_POST['login'])) {
    login($_POST['email'], $_POST['fjalekalimi']);
}
?>
<aside id="sidebar">
    <?php 
        if (empty($_SESSION['anetari'])) {
            echo '<form method="POST" id="login" class="box" action="">';
            echo '<legend>Forma për hyrje</legend>';
            echo '<fieldset>';
            echo '<label>Email: </label>';
            echo '<input type="email" id="email" name="email">';
            echo '</fieldset>';
            echo '<fieldset>';
            echo '<label>Fjalekalimi: </label>';
            echo '<input type="password" id="fjalekalimi" name="fjalekalimi">';
            echo '</fieldset>';
            echo '<input type="submit" name="login" id="login" value="Kycu">';
            echo '</form>';
        }
    ?>
    <section class="box">
        <h3 class="title">SMP ka këto funksionalitete:</h3>
        <ol>
            <li>Menaxhimin e anetareve(Shtimin| Fshirjen | Modifikimin)</li>
            <li>Menaxhimin e projekteve(Shtimin| Fshirjen | Modifikimin)</li>
            <li>Menaxhimin e puneve(Shtimin| Fshirjen | Modifikimin)</li>
            <li>Hyrjen dhe Daljen nga sistemi</li>
            <li>Menaxhime te tjera</li>
        </ol>
        <hr>
        <h3 class="title">Trajnimi Web Development ofron:</h3>
        <ul>
            <li>HTML & CSS</li>
            <li>JavaScript & jQuery</li>
            <li>PHP & MySQL</li>
            <li>Kodimi i projektit real SMP</li>
            <li>Kodimi i projektit real Rent a Car</li>
            <li>Detajet e trajnimit -
                <a href="https://probitacademy.com/courses/web-development-full-stack/">Probit Academy</a>
            </li>
        </ul>
    </section>

</aside>