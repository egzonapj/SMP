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
        <section class="projektet">
            <h3 class="title">Projektet e fundit</h3>
            <div class="slider">
                <?php
                $projektet = merrProjektet();
                $i = 0;
                while ($projekti = mysqli_fetch_assoc($projektet)) {
                    $projektiid = $projekti['projektiid'];
                    $emri = $projekti['emri'];
                    $pershkrimi = $projekti['pershkrimi'];
                    if (strlen($pershkrimi) > 120) {
                        $pershkrimi = substr($pershkrimi, 0, 100) . "...";
                    }
                    echo "<div class='card-info'>";
                    echo "<div class='card-img'>";
                    echo "<img src='images/project{$i}.jpg' alt='Projekti i pare'>";
                    echo "</div>";
                    echo "<div class='card-title'>";
                    echo "<h4>{$emri}</h4>";
                    echo "</div>";
                    echo "<div class='card-footer'><p>{$pershkrimi}</p></div>";
                    echo "<a class='meShume' href='meshume.php?prid={$projektiid}&i={$i}'>me shume &#8658;</a>";
                    echo "</div>";
                    $i++;
                    if ($i == 3) $i = 0;
                }
                ?>

            </div>
        </section>
        <table id="members">
            <tr>
                <th>Emri dhe Mbiemri</th>
                <th>Telefoni</th>
                <th>Email</th>
                <th>Data e lindjes</th>
                <th>Detaje</th>
            </tr>
            <?php
            $anetaret=merrAnetaret();
            $i=0;
            while ($anetari=mysqli_fetch_assoc($anetaret)) {
                $aid=$anetari['antariid'];
                if($i%2==0){
                    echo "<tr>";
                }else{
                    echo "<tr class='alt'>";
                }


                echo "<td>". $anetari['emri'] . ' '. $anetari['mbiemri'] . "</td>";
                echo "<td>". $anetari['telefoni'] . "</td>";
                echo "<td>". $anetari['email'] . "</td>";
                echo "<td>". $anetari['datalindjes'] . "</td>";
                echo "<td><a href='detaje.php?antariid=$aid'>Detaje</a></th>";
                echo "</tr>";
                $i++;
                if($i==6) break;
            }
            
            ?>
           
            <tr>
                <th>Emri dhe Mbiemri</th>
                <th>Telefoni</th>
                <th>Email</th>
                <th>Data e lindjes</th>
                <th>Detaje</th>
            </tr>
        </table>

    </section>
</main>
<?php include "inc/footer.php"; ?>