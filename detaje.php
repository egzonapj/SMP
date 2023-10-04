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
      if (isset($_GET['antariid'])) {
        $antari= merrAnetarId($_GET['antariid']);
        $emri=$antari['emri'];
        $mbiemri=$antari['mbiemri'];
        $telefoni=$antari['telefoni'];
        $email=$antari['email']; 
      }
        echo "<h3>" . "Emri dhe Mbiemri:  " . $emri . ' ' . $mbiemri . "</h3>";
        echo "<h5>" . "Email: " . $email . "</h5>";
        echo "<h5>" . "Telefoni:  " . $telefoni . "</h5>";
      ?>
      <table id="members">
        <tr>
          <th>Emri i Projektit</th>
          <th>Data</th>
          <th>Pershkrimi</th>
        </tr>
        <?php
          $detaje=detaje($_GET['antariid']);
          $i = 0;
          while ($anetari = mysqli_fetch_assoc($detaje)) {
            $emriPr=$anetari['emri'];
            $data=$anetari['data'];
            $pershkrimi=$anetari['pershkrimi']; 
            if ($i % 2 == 0) {
                echo "<tr>";
            } else {
                echo "<tr class='alt'>";
            }
            echo "<td>" . $emriPr . "</td>";
            echo "<td>" . $data . "</td>";
            echo "<td>" . $pershkrimi . "</td>";
            echo "</tr>";
        }
        ?>
      </table>
      
      
    </section>
</main>
<?php include "inc/footer.php"; ?>