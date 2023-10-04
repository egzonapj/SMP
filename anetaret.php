<?php include "inc/header.php"; 
if(!isset($_SESSION['anetari']) || $_SESSION['anetari']['roli']!=1){
    header("Location: index.php");
}
?>
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
        <h3 class="title">Lista e anatareve</h3>
        <a href="shtoanetar.php">Shto</a>
        <p id="mesazhi">
            <?php
                if(isset($_SESSION['mesazhi'])){
                    echo $_SESSION['mesazhi'];
                }
            ?>
        </p>
        <table id="members">
            <tr>
                <th>Emri dhe Mbiemri</th>
                <th>Telefoni</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $result = merrAnetaret();
            $i = 0;
            while ($anetari = mysqli_fetch_assoc($result)) {
                $antariid = $anetari['antariid'];
                if ($i % 2 == 0) {
                    echo "<tr>";
                } else {
                    echo "<tr class='alt'>";
                }
                echo "<td>" . $anetari['emri'] . ' ' . $anetari['mbiemri'] . "</td>";
                echo "<td>" . $anetari['email'] . "</td>";
                echo "<td>" . $anetari['telefoni'] . "</td>";
                echo "<td><a href='modifikoanetar.php?aid=$antariid'>Edit</a></td>";
                echo "<td><a href='fshijanetar.php?aid=$antariid'>Delete</a></td>";
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