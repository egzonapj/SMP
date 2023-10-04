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
    <!-- <h3 class="title">Lista e projekteve</h3> -->
    <a href="shtoprojekt.php">Shto</a>
  <p id="mesazhi">
    <?php
      if(isset($_SESSION['mesazhi'])){
          echo $_SESSION['mesazhi'];
      }
    ?>
  </p> 
    <?php 
    if (isset($_POST['ruaj'])){
      shtoProjekt($_POST['emri'], $_POST['datafillimit'], $_POST['datambarimit']);
    }
    ?>
    <form id="projekti" method="POST">
      <legend>Forma për regjistrimin e projekteve</legend>
      <input type="hidden" id="projektiid" name="projektiid" value="<?php if(!empty($projektiid)) echo $projektiid; ?>">
      <fieldset>
          <label>Emri: </label>
          <input type="text" id="emri" name="emri">
      </fieldset>
      <fieldset>
          <label>Data e fillimit : </label>
          <input type="date" id="datafillimit" name="datafillimit" pattern="\d{4}-\d{2}-\d{2}">
      </fieldset>
      <fieldset>
          <label>Data e mbarimit: </label>
          <input type="date" id="datambarimit" name="datambarimit" pattern="\d{4}-\d{2}-\d{2}">
      </fieldset>
      <input type="submit" name="ruaj" id="ruaj" value="Ruaj">
    </form>

  </section>
</main>
<?php include "inc/footer.php"; ?>