<?php
include ("classes/Table.php");
$tables = [new Table(),new Table(),new Table(),new Table(),new Table(),new Table(),new Table(),new Table()];
$tables[0]->name = "FURNIZORI";
$tables[0]->headers = array("FURNIZOR_ID","NUME","NUMAR_RECLAME","DATA_CONTRACT");
$tables[0]->headerFilters = [["idAsc","idDesc"],["numeAsc","numeDesc"],["numarAsc","numarDesc"],["dataAsc","dataDesc"]];
$tables[1]->name = "JUCATORI";
$tables[1]->headers = array("JUCATOR_ID","COOKIES","NUME","NUMAR_BANI","SCOR_MAXIM");
$tables[1]->headerFilters = [["idAsc","idDesc"],["cookiesAsc","cookiesDesc"],["numeAsc","numeDesc"],["baniAsc","baniDesc"],["scorAsc","scorDesc"]];
$tables[2]->name = "NIVELURI";
$tables[2]->headers = array("NIVEL_ID","NUMAR_INAMICI","TEREN");
$tables[2]->headerFilters = [["idAsc","idDesc"],["inamiciAsc","inamiciDesc"],["terenAsc","terenDesc"]];
$tables[3]->name = "PACHETE";
$tables[3]->headers = array("PACHET_ID","PRET","REDUCERE","CONTINUT");
$tables[3]->headerFilters = [["idAsc","idDesc"],["pretAsc","pretDesc"],["reducereAsc","reducereDesc"],["continutAsc","continutDesc"]];
$tables[4]->name = "PERSONAJE";
$tables[4]->headers = array("PERSONAJ_ID","JUCATOR_ID","NUME","PAR","CAP","CORP","PICIOARE");
$tables[4]->headerFilters = [["idAsc","idDesc"],["jucatorAsc","jucatorDesc"],["numeAsc","numeDesc"],["parAsc","parDesc"],["capAsc","capDesc"],["corpAsc","corpDesc"],["picioareAsc","picioareDesc"]];
$tables[5]->name = "RECLAME";
$tables[5]->headers = array("RECLAMA_ID","JUCATOR_ID","FURNIZOR_ID","ETICHETE","DURATA","RECOMPENSA");
$tables[5]->headerFilters = [["idAsc","idDesc"],["jucatorAsc","jucatorDesc"],["furnizorAsc","furnizorDesc"],["eticheteAsc","eticheteDesc"],["durataAsc","durataDesc"],["recompensaAsc","recompensaDesc"]];
$tables[6]->name = "SESIUNI";
$tables[6]->headers = array("SESIUNE_ID","JUCATOR_ID","NIVEL_ID","SCOR","DATA","DURATA");
$tables[6]->headerFilters = [["idAsc","idDesc"],["jucatorAsc","jucatorDesc"],["nivelAsc","nivelDesc"],["scorAsc","scorDesc"],["dataAsc","dataDesc"],["durataAsc","durataDesc"]];
$tables[7]->name = "TRANZACTII";
$tables[7]->headers = array("PACHET_ID","JUCATOR_ID","DATA");
$tables[7]->headerFilters = [["pachetAsc","pachetDesc"],["jucatorAsc","jucatorDesc"],["dataAsc","dataDesc"]];
$order = "";
$i = -1;

$host = "localhost";
$username = "root";
$password = "12345678";
$database = "baza_de_date_pentru_joc_de_telefon_cu_reclame_si_microtranzactii";

$sql = mysqli_connect($host, $username, $password, $database) or die('Couldn\'t connect');

if(!empty($_GET['furnizori'])) {
    $i = 0;
    if (!empty($_GET['idAsc']))
        $order = " ORDER BY FURNIZOR_ID ASC";
    elseif (!empty($_GET['idDesc']))
        $order = " ORDER BY FURNIZOR_ID DESC";
    elseif (!empty($_GET['numeAsc']))
        $order = " ORDER BY NUME ASC";
    elseif (!empty($_GET['numeDesc']))
        $order = " ORDER BY NUME DESC";
    elseif (!empty($_GET['numarAsc']))
        $order = " ORDER BY NUMAR_RECLAME ASC";
    elseif (!empty($_GET['numarDesc']))
        $order = " ORDER BY NUMAR_RECLAME DESC";
    elseif (!empty($_GET['dataAsc']))
        $order = " ORDER BY DATA_CONTRACT ASC";
    elseif (!empty($_GET['dataDesc']))
        $order = " ORDER BY DATA_CONTRACT DESC";
}
elseif(!empty($_GET['jucatori'])) {
    $i = 1;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY JUCATOR_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY JUCATOR_ID DESC";
    elseif(!empty($_GET['cookiesAsc']))
        $order = " ORDER BY COOKIES ASC";
    elseif(!empty($_GET['cookiesDesc']))
        $order = " ORDER BY COOKIES DESC";
    elseif(!empty($_GET['numeAsc']))
        $order = " ORDER BY NUME ASC";
    elseif(!empty($_GET['numeDesc']))
        $order = " ORDER BY NUME DESC";
    elseif(!empty($_GET['baniAsc']))
        $order = " ORDER BY NUMAR_BANI ASC";
    elseif(!empty($_GET['baniDesc']))
        $order = " ORDER BY NUMAR_BANI DESC";
    elseif(!empty($_GET['scorAsc']))
        $order = " ORDER BY SCOR_MAXIM ASC";
    elseif(!empty($_GET['scorDesc']))
        $order = " ORDER BY SCOR_MAXIM DESC";
}
elseif(!empty($_GET['niveluri'])) {
    $i = 2;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY NIVEL_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY NIVEL_ID DESC";
    elseif(!empty($_GET['inamiciAsc']))
        $order = " ORDER BY NUMAR_INAMICI ASC";
    elseif(!empty($_GET['inamiciDesc']))
        $order = " ORDER BY NUMAR_INAMICI DESC";
    elseif(!empty($_GET['terenAsc']))
        $order = " ORDER BY TEREN ASC";
    elseif(!empty($_GET['terenDesc']))
        $order = " ORDER BY TEREN DESC";
}
elseif(!empty($_GET['pachete'])) {
    $i = 3;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY PACHET_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY PACHET_ID DESC";
    elseif(!empty($_GET['pretAsc']))
        $order = " ORDER BY PRET ASC";
    elseif(!empty($_GET['pretDesc']))
        $order = " ORDER BY PRET DESC";
    elseif(!empty($_GET['reducereAsc']))
        $order = " ORDER BY REDUCERE ASC";
    elseif(!empty($_GET['reducereDesc']))
        $order = " ORDER BY REDUCERE DESC";
    elseif(!empty($_GET['continutAsc']))
        $order = " ORDER BY CONTINUT ASC";
    elseif(!empty($_GET['continutDesc']))
        $order = " ORDER BY CONTINUT DESC";
}
elseif(!empty($_GET['personaje'])) {
    $i = 4;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY PERSONAJ_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY PERSONAJ_ID DESC";
    elseif(!empty($_GET['jucatorAsc']))
        $order = " ORDER BY JUCATOR_ID ASC";
    elseif(!empty($_GET['jucatorDesc']))
        $order = " ORDER BY JUCATOR_ID DESC";
    elseif(!empty($_GET['numeAsc']))
        $order = " ORDER BY NUME ASC";
    elseif(!empty($_GET['numeDesc']))
        $order = " ORDER BY NUME DESC";
    elseif(!empty($_GET['parAsc']))
        $order = " ORDER BY PAR ASC";
    elseif(!empty($_GET['parDesc']))
        $order = " ORDER BY PAR DESC";
    elseif(!empty($_GET['capAsc']))
        $order = " ORDER BY CAP ASC";
    elseif(!empty($_GET['capDesc']))
        $order = " ORDER BY CAP DESC";
    elseif(!empty($_GET['corpAsc']))
        $order = " ORDER BY CORP ASC";
    elseif(!empty($_GET['corpDesc']))
        $order = " ORDER BY CORP DESC";
    elseif(!empty($_GET['picioareAsc']))
        $order = " ORDER BY PICIOARE ASC";
    elseif(!empty($_GET['picioareDesc']))
        $order = " ORDER BY PICIOARE DESC";
}
elseif(!empty($_GET['reclame'])) {
    $i = 5;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY RECLAMA_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY RECLAMA_ID DESC";
    elseif(!empty($_GET['jucatorAsc']))
        $order = " ORDER BY JUCATOR_ID ASC";
    elseif(!empty($_GET['jucatorDesc']))
        $order = " ORDER BY JUCATOR_ID DESC";
    elseif(!empty($_GET['furnizorAsc']))
        $order = " ORDER BY FURNIZOR_ID ASC";
    elseif(!empty($_GET['furnizorDesc']))
        $order = " ORDER BY FURNIZOR_ID DESC";
    elseif(!empty($_GET['eticheteAsc']))
        $order = " ORDER BY ETICHETE ASC";
    elseif(!empty($_GET['eticheteDesc']))
        $order = " ORDER BY ETICHETE DESC";
    elseif(!empty($_GET['durataAsc']))
        $order = " ORDER BY DURATA ASC";
    elseif(!empty($_GET['durataDesc']))
        $order = " ORDER BY DURATA DESC";
    elseif(!empty($_GET['recompensaAsc']))
        $order = " ORDER BY RECOMPENSA ASC";
    elseif(!empty($_GET['recompensaDesc']))
        $order = " ORDER BY RECOMPENSA DESC";
}
elseif(!empty($_GET['sesiuni'])) {
    $i = 6;
    if(!empty($_GET['idAsc']))
        $order = " ORDER BY SESIUNE_ID ASC";
    elseif(!empty($_GET['idDesc']))
        $order = " ORDER BY SESIUNE_ID DESC";
    elseif(!empty($_GET['jucatorAsc']))
        $order = " ORDER BY JUCATOR_ID ASC";
    elseif(!empty($_GET['jucatorDesc']))
        $order = " ORDER BY JUCATOR_ID DESC";
    elseif(!empty($_GET['nivelAsc']))
        $order = " ORDER BY NIVEL_ID ASC";
    elseif(!empty($_GET['nivelDesc']))
        $order = " ORDER BY NIVEL_ID DESC";
    elseif(!empty($_GET['scorAsc']))
        $order = " ORDER BY SCOR ASC";
    elseif(!empty($_GET['scorDesc']))
        $order = " ORDER BY SCOR DESC";
    elseif(!empty($_GET['dataAsc']))
        $order = " ORDER BY DATA ASC";
    elseif(!empty($_GET['dataDesc']))
        $order = " ORDER BY DATA DESC";
    elseif(!empty($_GET['durataAsc']))
        $order = " ORDER BY DURATA ASC";
    elseif(!empty($_GET['durataDesc']))
        $order = " ORDER BY DURATA DESC";
}
elseif(!empty($_GET['tranzactii'])) {
    $i = 7;
    if(!empty($_GET['pachetAsc']))
        $order = " ORDER BY PACHET_ID ASC";
    elseif(!empty($_GET['pachetDesc']))
        $order = " ORDER BY PACHET_ID DESC";
    elseif(!empty($_GET['jucatorAsc']))
        $order = " ORDER BY JUCATOR_ID ASC";
    elseif(!empty($_GET['jucatorDesc']))
        $order = " ORDER BY JUCATOR_ID DESC";
    elseif(!empty($_GET['dataAsc']))
        $order = " ORDER BY DATA ASC";
    elseif(!empty($_GET['dataDesc']))
        $order = " ORDER BY DATA DESC";
}
?>

<html>
<head>
<title><?php
    if($i==-1)
        echo "Acasa";
    elseif($i==0)
        echo "Furnizori";
    elseif($i==1)
        echo "Jucatori";
    elseif($i==2)
        echo "Niveluri";
    elseif($i==3)
        echo "Pachete";
    elseif($i==4)
        echo "Personaje";
    elseif($i==5)
        echo "Reclame";
    elseif($i==6)
        echo "Sesiuni";
    elseif($i==7)
        echo "Tranzactii";

    ?></title>
    <style>
        <?php include("css/main.css")?>
    </style>
</head>

<body>
<div class="bara">
    <a class="<?php if($i==-1) echo "active"?>" href="index.php">Acasa</a>
    <a class="<?php if($i==0) echo "active"?>" href="index.php?furnizori=true">Furnizori</a>
    <a class="<?php if($i==1) echo "active"?>" href="index.php?jucatori=true">Jucatori</a>
    <a class="<?php if($i==2) echo "active"?>" href="index.php?niveluri=true">Niveluri</a>
    <a class="<?php if($i==3) echo "active"?>" href="index.php?pachete=true">Pachete</a>
    <a class="<?php if($i==4) echo "active"?>" href="index.php?personaje=true">Personaje</a>
    <a class="<?php if($i==5) echo "active"?>" href="index.php?reclame=true">Reclame</a>
    <a class="<?php if($i==6) echo "active"?>" href="index.php?sesiuni=true">Sesiuni</a>
    <a class="<?php if($i==7) echo "active"?>" href="index.php?tranzactii=true">Tranzactii</a>
</div>
<?php
if($i != -1){?>
<table style="width:65%">
    <tr>
        <?php for($j = 0; $j < count($tables[$i]->headers); $j++){?>
            <th><div class="sort"><a href="
            <?php if(empty($_GET['edit'])){
                        if(empty($_GET[$tables[$i]->headerFilters[$j][0]]) && empty($_GET[$tables[$i]->headerFilters[$j][1]]))
                            echo ("index.php?" . strtolower($tables[$i]->name) . "=true&" . $tables[$i]->headerFilters[$j][0] . "=true");
                        elseif(!empty($_GET[$tables[$i]->headerFilters[$j][0]]))
                            echo ("index.php?" . strtolower($tables[$i]->name) . "=true&" . $tables[$i]->headerFilters[$j][1] . "=true");
                        else
                            echo ("index.php?" . strtolower($tables[$i]->name) . "=true");
                    }
                    ?>">
                        <?php if(empty($_GET['edit'])){
                            if (empty($_GET[$tables[$i]->headerFilters[$j][0]]) && empty($_GET[$tables[$i]->headerFilters[$j][1]]))
                                echo $tables[$i]->headers[$j];
                            elseif(!empty($_GET[$tables[$i]->headerFilters[$j][0]]))
                                echo ($tables[$i]->headers[$j] . " ^");
                            else
                                echo ($tables[$i]->headers[$j] . " v");
                        }else echo $tables[$i]->headers[$j];
                        ?>
                    </a></div></th>
        <?php }
        if(empty($_GET['edit'])){?>
            <th class="tools"></th>
        <?php }?>
    </tr>
    <?php
    $k = 0;
    $query = mysqli_query($sql, "SELECT * FROM " . $tables[$i]->name . $order);
    while ($row = mysqli_fetch_assoc($query)){
        $k++;
        if(empty($_GET['edit'])){
            if(empty($_GET['delete']) || $_GET['delete'] != $k) {?>
                <tr>
                    <?php for($j = 0; $j < count($tables[$i]->headers); $j++){?>
                        <td><?php if($row[$tables[$i]->headers[$j]] != null)
                                echo $row[$tables[$i]->headers[$j]];
                            else
                                echo "-";
                            ?></td>
                    <?php }?>
                    <td class="tools"><a href="
                <?php $output = "index.php?" . strtolower($tables[$i]->name) . "=true&";
                        for($j = 0; $j < count($tables[$i]->headers); $j++){
                            if(!empty($_GET[$tables[$i]->headerFilters[$j][0]]))
                                $output .= $tables[$i]->headerFilters[$j][0] . "=true&";
                            if(!empty($_GET[$tables[$i]->headerFilters[$j][1]]))
                                $output .= $tables[$i]->headerFilters[$j][1] . "=true&";
                        }
                        echo ($output . "edit=" . $k);?>">Edit</a>
                        <a href="
                <?php $output = "index.php?" . strtolower($tables[$i]->name) . "=true&";
                        for($j = 0; $j < count($tables[$i]->headers); $j++){
                            if(!empty($_GET[$tables[$i]->headerFilters[$j][0]]))
                                $output .= $tables[$i]->headerFilters[$j][0] . "=true&";
                            if(!empty($_GET[$tables[$i]->headerFilters[$j][1]]))
                                $output .= $tables[$i]->headerFilters[$j][1] . "=true&";
                        }
                        echo ($output . "delete=" . $k);?>">Delete</a></td>
                </tr>
            <?php }
            else{
                $q = "DELETE FROM " . $tables[$i]->name . " WHERE ";
                for($j = 0; $j < count($tables[$i]->headers); $j++){
                    if(strstr($tables[$i]->headers[$j], "ID")){
                        if($j != 0)
                            $q .= " AND ";
                        $q .= $tables[$i]->headers[$j] . "=" . $row[$tables[$i]->headers[$j]];

                        }
                    }
                echo $q;
                mysqli_query($sql, $q);
                }
        }
    }?>
</table> <?php }?>
<?php
if($i != -1){
    $k=0;
    $query = mysqli_query($sql, "SELECT * FROM " . $tables[$i]->name . $order);
    while ($row = mysqli_fetch_assoc($query)){
        $k++;
        if(!empty($_GET['edit']) && $k == $_GET['edit']){?>
            <div class="formular"><form method="post">
            <?php for($j = 0; $j < count($tables[$i]->headers); $j++) {?>
                <input type="text" name="<?php echo $tables[$i]->headers[$j]?>" value="<?php echo $row[$tables[$i]->headers[$j]]?>" placeholder="<?php echo "Introduceti " . $tables[$i]->headers[$j]?>" required <?php if(strstr($tables[$i]->headers[$j],"ID")) echo "readonly"?>>
            <?php }?>
                <input class="button" type="submit" name="update" value="Update">
                <a class="button" href="<?php echo ("index.php?" . strtolower($tables[$i]->name) . "=true")?>">Return to table</a>
                </form></div>
<?php }
}
if(isset($_POST['update'])) {
    $edit = "UPDATE " . $tables[$i]->name . " SET ";
    for($j = 0; $j < count($tables[$i]->headers); $j++)
        if(!strstr($tables[$i]->headers[$j], "ID"))
            $edit .= $tables[$i]->headers[$j] . "='" . $_POST[$tables[$i]->headers[$j]] . "', ";
    $edit = substr_replace($edit, "", -1);
    $edit = substr_replace($edit, "", -1);
    $edit .= " WHERE";
    for($j = 0; $j < count($tables[$i]->headers); $j++)
        if(strstr($tables[$i]->headers[$j], "ID")){
            if($j != 0)
                $edit .= " AND";
            $edit .= " " . $tables[$i]->headers[$j] . "=" . $_POST[$tables[$i]->headers[$j]];
        }
    if(mysqli_query($sql, $edit) == TRUE){ ?>
        <p class="message">Editare reusita</p>
    <?php }else{ ?>
        <p class="message">Eroare la introducerea datelor</p>
    <?php }
}
}
    if($i == -1){
        $ok = 0;?>
        <form method="post">
            <input name="command" placeholder="Input command" class="command" required>
            <input class="button"type="submit" name="run" value="Run Command">
            <a class="button" href="index.php?comm1=true">Join Command</a>
            <a class="button" href="index.php?comm2=true">Group Command</a>
        </form>
<?php
        if(isset($_POST['run']) || !empty($_GET['comm1']) || !empty($_GET['comm2'])){
            if(isset($_POST['run']))
                $join = $_POST['command'];
            elseif(!empty($_GET['comm1']))
                $join = "SELECT J.NUME, N.TEREN, S.DATA FROM SESIUNI S LEFT JOIN JUCATORI J ON (S.JUCATOR_ID = J.JUCATOR_ID) LEFT JOIN NIVELURI N ON (S.NIVEL_ID = N.NIVEL_ID) WHERE (J.SCOR_MAXIM > 1000) AND (S.DATA < '2022-01-10')";
            elseif(!empty($_GET['comm2']))
                $join = "SELECT F.NUME, AVG(DURATA) AS DURATA_MEDIE FROM RECLAME R LEFT JOIN FURNIZORI F ON (R.FURNIZOR_ID = F.FURNIZOR_ID) GROUP BY F.NUME, RECOMPENSA HAVING RECOMPENSA!=0";
            $randuri = mysqli_query($sql, $join);
            ?><table style="width:65%"><?php
            while($row = mysqli_fetch_assoc($randuri)){
                $columnNames = array_keys($row);
                if($ok == 0){
                    $ok = 1?>
                    <tr>
                        <?php
                        for($j = 0; $j < count($columnNames); $j++){?>
                            <th><a class="sort">
                                    <?php echo $columnNames[$j]?>
                                </a></th>
                        <?php }?>
                    </tr>
                <?php }
                ?>
                <tr>
                    <?php
                    for($j = 0; $j < count($columnNames); $j++){?>
                        <td>
                            <?php echo $row[$columnNames[$j]]?>
                        </td>
                    <?php }?>
                </tr>
                <?php
            }
        }
    }
?>
</body>

</html>