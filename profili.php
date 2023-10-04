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
      <h3 class="title">Profili Juaj</h3>
      <p id="mesazhi">
            <?php
                if(isset($_SESSION['mesazhi'])){
                    echo $_SESSION['mesazhi'];
                }
            ?>
        </p>
      <?php
        if (isset($_SESSION['anetari'])) {
          $antariid=$_SESSION['anetari']['antariid'];
          $antari=merrAnetarId($antariid);
          $antariid=$antari['antariid'];
          $emri=$antari['emri'];
          $mbiemri=$antari['mbiemri'];
          $datalindjes=$antari['datalindjes'];
          $nrpersonal=$antari['nrpersonal'];
          $telefoni=$antari['telefoni'];
          $email=$antari['email'];
          $fjalekalimi=$antari['fjalekalimi'];
          echo "<h3>" . "Emri dhe Mbiemri:  " . $emri . ' ' . $mbiemri . "</h3>";
          echo "<h5>" . "Email: " . $email . "</h5>";
          echo "<h5>" . "Fjalekalimi: " . $fjalekalimi . "</h5>";
          echo "<h5>" . "Telefoni:  " . $telefoni . "</h5>";
          echo "<h5>" . "Data e lindjes:  " . $datalindjes . "</h5>";
          echo "<h5>" . "Numri personal:  " . $nrpersonal . "</h5>";
          echo "<h5><a href='modifikoprofilin.php?profiliid=$antariid'>Modifiko Profilin</a></h5>";
        }
        
      ?>
      </section>
</main>
<?php include "inc/footer.php"; ?>