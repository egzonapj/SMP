<?php
session_start();
$dbconn = "";
function dbConn()
{
    global $dbconn;
    $dbconn = mysqli_connect("localhost", 'root', '', 'smp');
    if (!$dbconn) {
        die("Deshtoi lidhja me DB" . mysqli_error($dbconn));
    }
}
dbConn();
if(isset($_GET['argument'])){
    if($_GET['argument']=='dalja'){
        session_destroy();
        echo "index.php";
    }
    else if($_GET['argument']=='mesazhi'){
        unset($_SESSION['mesazhi']);
    }

}
function login($email, $fjalekalimi)
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,email,telefoni,datalindjes,fjalekalimi,roli FROM antaret ";
    $sql .= " WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $result = mysqli_query($dbconn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $anetariData = mysqli_fetch_assoc($result);
        $anetari = array();
        $anetari['antariid'] = $anetariData['antariid'];
        $anetarilogin = $anetari['antariid'];
        $anetari['emri'] = $anetariData['emri'];
        $anetari['mbiemri']=$anetariData['mbiemri'];
        $anetari['datalindjes']=$anetariData['datalindjes'];
        $anetari['nrpersonal']=$anetariData['nrpersonal'];
        $anetari['telefoni']=$anetariData['telefoni'];
        $anetari['roli'] = $anetariData['roli'];
        $_SESSION['anetari']=$anetari;
        header("Location: punet.php");
    } else {
        echo "Nuk ka perdoues me keto shenime ";
    }
}

/* Funksionet per anetaret */
function merrAnetaret()
{
    global $dbconn;
    $sql = "SELECT antariid,emri,mbiemri,email,telefoni,datalindjes,fjalekalimi FROM antaret ";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}
function merrAnetarId($antariid)
{
    global $dbconn;
    $sql = "SELECT * FROM antaret WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function shtoAnetar($emri, $mbiemri, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "INSERT INTO antaret(emri,mbiemri,email,telefoni,fjalekalimi)";
    $sql .= " VALUES ('$emri','$mbiemri','$email','$telefoni','$fjalekalimi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Anetari u shtua me sukses";
        header("Location: anetaret.php");
    } else {
        echo 'Deshtoi shtimi i anetarit';
        die(mysqli_error($dbconn));
    }
}
function modifikoAnetar($antariid, $emri, $mbiemri, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "UPDATE antaret SET emri='$emri', mbiemri='$mbiemri', telefoni='$telefoni',";
    $sql .= " email='$email', fjalekalimi='$fjalekalimi' WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Anetari u modifikua me sukses";
        header("Location: anetaret.php");
    } else {
        echo 'Deshtoi modifikimi i anetarit';
        die(mysqli_error($dbconn));
    }
}
function modifikoProfil($antariid, $emri, $mbiemri, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "UPDATE antaret SET emri='$emri', mbiemri='$mbiemri', telefoni='$telefoni',";
    $sql .= " email='$email', fjalekalimi='$fjalekalimi' WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Profili u modifikua me sukses";
        header("Location: profili.php");
    } else {
        echo 'Deshtoi modifikimi i profilit';
        die(mysqli_error($dbconn));
    }
}
function fshijAnetar($antariid)
{
    global $dbconn;
    $sql = "DELETE FROM antaret  WHERE antariid=$antariid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Anetari u fshi me sukses";
        header("Location: anetaret.php");
    } else {
        echo 'Deshtoi fshirja e anetarit';
        die(mysqli_error($dbconn));
    }
}

/** Funksionet per punet*/
function merrPunet()
{
    global $dbconn;
    $anetariid=$_SESSION['anetari']['antariid'];
    $sql = "SELECT p.punaid, pr.emri, p.data, p.pershkrimi ";
    $sql .= "FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    if($_SESSION['anetari']['roli']!=1){
        $sql.=" WHERE antariid= $anetariid";
    }
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}
function merrPuneId($punaid)
{
    global $dbconn;
    $sql = "SELECT p.punaid, pr.projektiid,pr.emri, p.data, p.pershkrimi ";
    $sql .= "FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid";
    $sql .= " WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}
function shtoPune($projektiid, $datapune, $pershkrimi)
{
    global $dbconn;
    $anetariid=$_SESSION['anetari']['antariid'];
    $sql = "INSERT INTO punet(antariid,projektiid,data,pershkrimi)";
    $sql .= " VALUES ($anetariid,$projektiid,'$datapune','$pershkrimi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Puna u shtua me sukses";
        header("Location: punet.php");
    } else {
        echo 'Deshtoi shtimi i punes';
        die(mysqli_error($dbconn));
    }
}
function modifikoPune($punaid, $projektiid, $datapune, $pershkrimi)
{
    global $dbconn;

    $sql = "UPDATE punet SET projektiid=$projektiid,data='$datapune',pershkrimi='$pershkrimi'";
    $sql .= " WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']= "Puna u modifikua me sukses";
        header("Location: punet.php");

    } else {
        echo 'Deshtoi modifikimi i punes';
        die(mysqli_error($dbconn));
    }
}
function fshijPune($punaid)
{
    global $dbconn;

    $sql = "DELETE FROM punet WHERE punaid=$punaid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Puna u fshi me sukses";
        header("Location: punet.php");
    } else {
        echo 'Deshtoi fshirja e punes';
        die(mysqli_error($dbconn));
    }
}
/** Funksionet per projektet*/
function merrProjektet()
{
    global $dbconn;
    $sql = "SELECT * FROM projektet";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}

function merrProjektiId($projektiid) {
    global $dbconn;
    $sql="SELECT projektiid, emri, datafillimit, datambarimit FROM projektet WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }
}


function shtoProjekt($emri, $datafillimit, $datambarimit) {
    global $dbconn;
    $sql="INSERT INTO projektet(emri, datafillimit, datambarimit)";
    $sql.=" VALUES ('$emri','$datafillimit','$datambarimit')";
    $result=mysqli_query($dbconn,$sql);
    if($result){
        $_SESSION['mesazhi']="Projekti u shtua me sukses";
        header("Location: projektet.php");
    }else{
        echo 'Deshtoi shtimi i projektit';
        die(mysqli_error($dbconn));
    }
}

function modifikoProjekt($projektiid, $emri, $datafillimit, $datambarimit) {
    global $dbconn;
    $sql = "UPDATE projektet SET emri='$emri', datafillimit='$datafillimit', datambarimit='$datambarimit' WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Projekti u modifikua me sukses";
        header("Location: projektet.php");
    } else {
        echo 'Deshtoi modifikimi i projektit';
        die(mysqli_error($dbconn));
    }
}

function fshijProjekt($projektiid)
{
    global $dbconn;
    $sql = "DELETE FROM projektet  WHERE projektiid=$projektiid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Projekti u fshi me sukses";
        header("Location: projektet.php");
    } else {
        echo 'Deshtoi fshirja e projektit';
        die(mysqli_error($dbconn));
    }
}

function merrProjektiInfo($prid) {
    global $dbconn;
    $sql = "SELECT * FROM projektet WHERE projektiid=$prid";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        echo "Nuk ka shenime";
    }

} 

function regjistrohu($emri, $mbiemri, $datalindjes, $nrpersonal, $telefoni, $email, $fjalekalimi)
{
    global $dbconn;
    $sql = "INSERT INTO antaret(emri,mbiemri,datalindjes,nrpersonal, email,telefoni,fjalekalimi)";
    $sql .= " VALUES ('$emri','$mbiemri','$datalindjes','$nrpersonal','$email','$telefoni','$fjalekalimi')";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        $_SESSION['mesazhi']="Regjistrimi me sukses";
        login($email, $fjalekalimi);

    }else {
        echo 'Deshtoi regjistrimi';
        die(mysqli_error($dbconn));
    }  
}

function detaje($aid) {
    global $dbconn;
    $sql ="SELECT p.antariid, pr.emri, p.data, p.pershkrimi FROM punet p INNER JOIN projektet pr ON p.projektiid=pr.projektiid WHERE p.antariid=$aid ORDER BY p.data DESC";
    $result = mysqli_query($dbconn, $sql);
    if ($result) {
        return $result;
    } else {
        echo "Nuk ka shenime";
    }
}


