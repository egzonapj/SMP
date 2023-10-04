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
      if (isset($_GET['prid'])) {
          $projekti=merrProjektiInfo($_GET['prid']);
          $i=$_GET['i'];
          $pershkrimi=$projekti['pershkrimi'];
          $emri=$projekti['emri'];
          $datafillimit=$projekti['datafillimit'];
          $datambarimit=$projekti['datafillimit'];
      }
      ?>
      <article id="projekti-info">
        <?php
        echo "<h3 class='title'>{$emri}</h3>";
        echo "<div>";
        echo "<img src='images/project{$i}.jpg' alt='Projekti i pare'>";
        echo "<p>Pershkrimi: <br>{$pershkrimi}</p>";
        echo "<p>Data e fillimit: {$datafillimit}</p>";
        echo "<p>Data e mbarimit: {$datambarimit}</p>"; 
        echo "</div>";
        ?>
      </article>
  
    </section>
</main>
<?php include "inc/footer.php"; ?>