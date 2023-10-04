<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SMP Projekti</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header Part-->
    <header class="header">
        <nav class="container">
            <a href="index.php" id="logo">
                <img src="images/smp_logo.png" alt="SMP Logo">
            </a>
            <ul id="navbar">
                <li><a href="index.php">Ballina</a></li>
                <?php
                if (isset($_SESSION['anetari'])) {
                    echo "<li><a href='punet.php'>Punet</a></li>";
                    if ($_SESSION['anetari']['roli'] == 1) {
                        echo "<li><a href='projektet.php'>Projektet</a></li>";
                        echo "<li><a href='anetaret.php'>Anetaret</a></li>";
                    }
                    echo "<li><a href='profili.php'>Profili</a></li>";
                    echo "<li><a id='dalja' href='index.php'>Dalja</a></li>";
                }else {
                    echo "<li><a href='regjistrohu.php'>Regjistrohu</a></li>";
                }

                ?>

            </ul>
        </nav>
        <section id="banner">
            <img src="images/banner1.png" alt="Banner 1" title="Banner 1">
            <h1> Sistemi për menaxhimin e projekteve - SMP </h1>
        </section>
    </header>