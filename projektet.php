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
    <a href="shtoprojekt.php">Shto</a>
    <p id="mesazhi">
      <?php
          if(isset($_SESSION['mesazhi'])){
              echo $_SESSION['mesazhi'];
          }
      ?>
    </p>
    <table id="members">
      <tr>
          <th>Emri</th>
          <th>Data e fillimit</th>
          <th>Data e mbarimit</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
      <?php 
      $result=merrProjektet();
      $i=0;
      while($projekti=mysqli_fetch_assoc($result)){
        $projektiid = $projekti['projektiid'];
        //print_r($projekti); echo "<br>";
        if($i%2==0){
            echo "<tr>";
        }else{
            echo "<tr class='alt'>";
        }
        echo "<td>". $projekti['emri'] . "</td>";
        echo "<td>". $projekti['datafillimit'] . "</td>";
        echo "<td>". $projekti['datambarimit'] . "</td>";
        echo "<td><a href='modifikoprojekt.php?pid=$projektiid'>Edit</a></td>";
        echo "<td><a href='fshijprojekt.php?pid=$projektiid'>Delete</a></td>";
        echo "</tr>";
      }
      ?>
      <tr>
          <th>Emri</th>
          <th>Data e fillimit</th>
          <th>Data e mbarimit</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
    </table>
  </section>
</main>
<?php include "inc/footer.php"; ?>