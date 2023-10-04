<?php include "inc/header.php"; ?>
<main class="container page">
    <article id="maininfo">
        <h2 class="title">SMP Projekti Pershkrimi</h2>
        <p>
            Sistemi për menaxhimin e projekteve mundëson një kompanie menaxhimin e punëve nga punëtorët e saj për
            projektet që ajo ka. Sistemi ofron menaxhimin e stafit: shtimin, modifikimin fshirjen, paraqitjen e
            stafit, menaxhimin e projekteve: shtimin, modifikimin fshirjen, paraqitjen e projekteve dhe menaxhimin e
            punëve ë bën stafi në kuadër të projekteve.
        </p>
    </article>
    <?php include "inc/sidebar.php"; ?>
    <section id="content" class="box">

        <?php
        if (isset($_GET['aid'])) {
            $antari = merrAnetarId($_GET['aid']);
            $antariid = $antari['antariid'];
            $emri = $antari['emri'];
            $mbiemri = $antari['mbiemri'];
            $telefoni = $antari['telefoni'];
            $email = $antari['email'];
            $fjalekalimi = $antari['fjalekalimi'];
        }
        if (isset($_POST['fshije'])) {
            fshijAnetar($_POST['antariid']);
        }
        ?>
        <form id="anetari" method="POST">
            <legend>Forma për fshirjen e anetareve</legend>
            <input type="hidden" id="antariid" name="antariid" value="<?php if (!empty($antariid)) echo $antariid; ?>">
            <fieldset>
                <label>Emri: </label>
                <input disabled type="text" id="emri" name="emri" value="<?php if (!empty($emri)) echo $emri; ?>">
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input disabled type="text" id="mbiemri" name="mbiemri" value="<?php if (!empty($mbiemri)) echo $mbiemri; ?>">
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input disabled type="text" id="telefoni" name="telefoni" value="<?php if (!empty($telefoni)) echo $telefoni; ?>">
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input disabled type="email" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>">
            </fieldset>
            <fieldset>
                <label>Fjalekalimi: </label>
                <input disabled type="password" id="fjalekalimi" name="fjalekalimi" value="<?php if (!empty($fjalekalimi)) echo $fjalekalimi; ?>">
            </fieldset>
            <input type="submit" name="fshije" id="fshije" value="Fshije">
        </form>

    </section>
</main>
<?php include "inc/footer.php"; ?>