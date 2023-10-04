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
    <p id="mesazhi">
        <?php
            if(isset($_SESSION['mesazhi'])){
                echo $_SESSION['mesazhi'];
            }
        ?>
    </p>
        <?php
        if (isset($_SESSION['anetari'])) {
          echo "Ju jeni i regjistruar";
          
        }else {

          if (isset($_POST['ruaj'])) {
              regjistrohu($_POST['emri'],$_POST['mbiemri'], $_POST['datalindjes'], $_POST ['nrpersonal'], $_POST['telefoni'],
              $_POST['email'],$_POST['fjalekalimi']);
        }
      }
        ?>
        <form id="anetari" method="POST">
            <legend>Forma për regjitrim</legend>
            <fieldset>
                <label>Emri: </label>
                <input type="text" id="emri" name="emri">
            </fieldset>
            <fieldset>
                <label>Mbiemri: </label>
                <input type="text" id="mbiemri" name="mbiemri">
            </fieldset>
            <fieldset>
                <label>Data e Lindjes: </label>
                <input type="date" id="datalindjes" name="datalindjes">
            </fieldset>
            <fieldset>
                <label>Numri Personal: </label>
                <input type="text" id="nrpersonal" name="nrpersonal">
            </fieldset>
            <fieldset>
                <label>Telefoni: </label>
                <input type="text" id="telefoni" name="telefoni">
            </fieldset>
            <fieldset>
                <label>Email: </label>
                <input type="email" id="email" name="email">
            </fieldset>
            <fieldset>
                <label>Fjalekalimi: </label>
                <input type="password" id="fjalekalimi" name="fjalekalimi">
            </fieldset>
            <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
        </form>

    </section>
</main>
<?php include "inc/footer.php"; ?>