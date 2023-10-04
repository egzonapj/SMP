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
        if (isset($_GET['pid'])) {
            $puna=merrPuneId($_GET['pid']);
            $punaid=$puna['punaid'];
            $projektiId=$puna['projektiid'];
            $projektiEmri=$puna['emri'];
            $datapune=$puna['data'];
            $datapune=date('Y-m-d', strtotime($datapune));
            $pershkrimi=$puna['pershkrimi'];
        }
        if (isset($_POST['ruaj'])) {

            modifikoPune($_POST['punaid'],$_POST['projektiid'], $_POST['datapune'], $_POST['pershkrimi']);
        }

        ?>


        <form id="puna" method="POST">
            <legend>Forma për regjitrimin e puneve</legend>
            <fieldset>
            <input type="hidden" id="punaid" name="punaid" value="<?php if(!empty($punaid)) echo $punaid; ?>">
                <label>Emri i projektit: </label>
                <select id='projektiid' name="projektiid">
                    <?php
                    echo "<option value='$projektiId'>$projektiEmri</option>";
                    $projektet=merrProjektet();
                    while ($projekti=mysqli_fetch_assoc($projektet)) {
                        $pid=$projekti['projektiid'];
                        $emri=$projekti['emri'];
                        if($projektiId!=$pid){
                            echo "<option value='$pid'>$emri</option>";
                        }
                        
                    }
                    ?>
                </select>
            </fieldset>
            <fieldset>
                <label>Data e punes: </label>
                <input type="date" id="datapune" name="datapune"
                value="<?php if(!empty($datapune)) echo $datapune; ?>">
            </fieldset>
            <fieldset>
                <label>Pershkrimi: </label>
                <textarea id="pershkrimi" name="pershkrimi">
                <?php if(!empty($pershkrimi)) echo $pershkrimi; ?>
                </textarea>
            </fieldset>
            <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
        </form>
    </section>
</main>
<?php include "inc/footer.php"; ?>