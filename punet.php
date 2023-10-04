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
            <h3 class="title">Lista e puneve</h3>
            <a href="shtopune.php">Shto</a>
            <p id="mesazhi">
                <?php
                    if(isset($_SESSION['mesazhi'])){
                        echo $_SESSION['mesazhi'];
                    }
                ?>
            </p>
            <table id="members">
                <tr>
                    <th>Emri i Projektit</th>
                    <th>Data e punes</th>
                    <th>Pershkrimi</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
    
                <?php
                $result = merrPunet();
                $i = 0;
                while ($puna = mysqli_fetch_assoc($result)) {
                    $punaid = $puna['punaid'];
                    if ($i % 2 == 0) {
                        echo "<tr>";
                    } else {
                        echo "<tr class='alt'>";
                    }
                    $pershkrimi=$puna['pershkrimi'];
                    if(strlen($pershkrimi)>50){
                        $pershkrimi=substr($pershkrimi,0,50) . " ...";
                    }
                    echo "<td>" . $puna['emri'] . "</td>";
                    echo "<td>" . $puna['data'] . "</td>";
                    echo "<td>" . $pershkrimi . "</td>";
                    echo "<td><a href='modifikopune.php?pid=$punaid'>Edit</a></td>";
                    echo "<td><a href='fshijpune.php?pid=$punaid'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
                <tr>
                    <th>Emri dhe Mbiemri</th>
                    <th>Telefoni</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </table>
    
    </section>
</main>
<?php include "inc/footer.php"; ?>