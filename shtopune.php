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
        <!-- <h3 class="title">Lista e anatareve</h3> -->

        <?php
        if (isset($_POST['ruaj'])) {
            //print_r($_POST);
            shtoPune($_POST['projektiid'],$_POST['datapune'],$_POST['pershkrimi']);
        }
        ?>
        <form id="puna" method="POST">
            <legend>Forma për regjitrimin e puneve</legend>
            <fieldset>
                <label>Emri i projektit: </label>
                <select id='projektiid' name="projektiid">
                    <option value="0">Zgjedh Projektin</option>
                    <?php
                    $projektet=merrProjektet();
                    while ($projekti=mysqli_fetch_assoc($projektet)) {
                        $projektiId=$projekti['projektiid'];
                        $emri=$projekti['emri'];
                        echo "<option value='$projektiId'>$emri</option>";
                    }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Data e punes: </label>
                <input type="date" id="datapune" name="datapune">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <textarea id="pershkrimi" name="pershkrimi"></textarea>
            </fieldset>
            <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
        </form>

    </section>
</main>
<?php include "inc/footer.php"; ?>