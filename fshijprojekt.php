<?php include "inc/header.php" ?>
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
    <h3 class="title">Lista e projekteve</h3>
    <p id="mesazhi">
      <?php
        if(isset($_SESSION['mesazhi'])){
          echo $_SESSION['mesazhi'];
        }
      ?>
    </p>
    <?php
      $dbconn = mysqli_connect("localhost", 'root', '', 'smp');
      if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
      }
      if (isset($_GET['pid'])) {
        $projekti=merrProjektiId($_GET['pid']);
        $projektiid=$projekti['projektiid'];
        $emri=$projekti['emri'];
        $datafillimit=$projekti['datafillimit'];
        $datambarimit=$projekti['datambarimit'];
      }
      if (isset($_POST['fshij'])) {
        fshijProjekt($projektiid);
      }
    ?>
    <form id="projekti" method="POST">
      <legend>Forma për fshirjen e projekteve</legend>
      <fieldset>
          <label>Emri: </label>
          <input disabled type="text" id="emri" name="emri" value="<?php if(!empty($emri)) echo $emri; ?>">
      </fieldset>
      <fieldset>
          <label>Data e fillimit : </label>
          <input disabled type="date" id="datafillimit" name="datafillimit" pattern="\d{4}-\d{2}-\d{2}" value="<?php if(!empty($datafillimit)) echo $datafillimit; ?>">
      </fieldset>
      <fieldset>
          <label>Data e mbarimit: </label>
          <input disabled type="date" id="datambarimit" name="datambarimit" pattern="\d{4}-\d{2}-\d{2}" value="<?php if(!empty($datambarimit)) echo $datambarimit; ?>">
      </fieldset>
      <input type="submit" name="fshij" id="fshij" value="Fshij">
    </form>

  </section>
</main>
<?php include "inc/footer.php"; ?>


     
