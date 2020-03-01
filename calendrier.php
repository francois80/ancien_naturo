<?php
$reloadMonths = false; //variable qui indique si on a posté un mois inférieur au mois actuel
//tableau des jours
//$weekDays = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
$weekDays = ['L','M','M','J','V','S','D'] ;
//tableau des mois
$yearMonths = ['Janvier','février','mars','avril','mai','juin','juillet','aôut','septembre','octobre','novembre','décembre'] ;
//mois en chiffre dans l'année en cours
$numMonth = date('n');

//si après le $_POST on a choisi un mois inférieur au mois de l'année en cours, on réaffiche la liste à partir du mois de l'année en cours
if(!empty($_POST['month']) && !empty($_POST['year'])){
  //timestamp du mois et de l'année choisi dans les listes mois et années
  $timePost = mktime(0, 0, 0, date($_POST['month'])  , 0, date($_POST['year']));
  //timestamp du mois de l'année en cours
  $timeNow = mktime(0, 0, 0, date('m')  , 0, date('Y'));
  //si le mois choisi est inférieur au mois en cours, la varialble qui recharge la liste des mois est vrai
  if($timePost <= $timeNow){
    $reloadMonths = true;
  }
}

$tab = [];//tableau commençant au mois en cours de l'année en cours
//boucle pour mettre dans $tab tous les mois de l'année à partir du mois actuel
for($count = $numMonth ; $count <= count($yearMonths) ; $count ++){
  $tab[$count -1] = $yearMonths[$count -1];
}

//si on n'a pas choisi de date, on écrase le tableau des mois d'une année entière par celui de l'année en cours
//idem si la variable qui recharge la liste des mois est vrai
if(empty($_POST['month']) && !$reloadMonths){
  $yearMonths = $tab;
}
//si on choisi une année supérieur à l'année en cours, la liste des mois s'est affichée au complet,
// mais si on rechoisi une date et un mois inférieur à l'année en cours,
//on repositionne le select du mois sur le mois actuel
if(!empty($_POST['month']) && $_POST['year'] == date('Y')){
  $yearMonths = $tab;
}

$currentMonth =  !empty ($_POST['month'])? $_POST['month']: date('m') ; //mois choisi sinon mois courant
//si on a choisi une date mais...
if(!empty ($_POST['month']) && $reloadMonths){
  //si le mois choisi est inférieur au mois en cours, on remet le mois en cours dans la variable qui sert de calcul
  //pour les nombrs de jours du calendrier...
    if($currentMonth <= $numMonth){
      $currentMonth = $numMonth;
    }
    //sinon on rajoute le nombre de mois au mois en cours pour le bon affichage du calendrier
    //(parce qu'ici le mois est le mois actuel, et le tableau n'a pas 12 mois, d'est celui de l'année en encours
    //et non celui d'une année pleine)
    else{
      $currentMonth += $currentMonth;
    }
}

$selectedYear = !empty ($_POST['year'])? $_POST['year']: date('Y') ; //année choisie sinon année courante
$daysinMont = date('t', mktime(0,0,0,$currentMonth,1,$selectedYear));// nombre de jour dans le mois
$firstDayinMonthinWeek = date('N', mktime(0,0,0,$currentMonth,1,$selectedYear));//position du jour dans la semaine
$currentYear = date('Y');//année encours sur 4
$NextYear = date('Y') +1;//année suivante sur 4

include 'header.php';
?>

<main class="container">
<?php include 'nav.php'; ?>
  <div id="content" class="row justify-content-center margeTop border">
        <div class="container-fluid col-md-6">
          <div class="raw">
            <form method="post">
                <select name="month">
                    <?php
                    //affichage de liste des mois
                    foreach ($yearMonths as $monthsNumber => $yearMonth): ?>
                    <option value="<?= $monthsNumber+1 ?>" <?php  if(!empty($_POST['month'])){if($_POST['month']==$monthsNumber+1){echo "selected";}else{echo '';}}?> ?><?= $yearMonth ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="year">
                    <?php
                    //affichage de la liste des années
                    for($year = $currentYear; $year <= $NextYear; $year ++): ?>
                    <option value="<?= $year ?>" <?=  ($selectedYear == $year) ? 'selected' : '' ?>><?= $year ?></option>
                    <?php endfor; ?>
                </select>
                <input type="submit" />
            </form>
            <h2><?php if(!empty($_POST['month'])){echo $yearMonths[$_POST['month']-1];}else{echo"";}?> <?= $selectedYear ?></h2>
            <table class="table table-bordered">
                <thead>
                <?php
                //affichage de l'entête du tableau avec les jours de la semaine contenu dans la table $weekDays
                    foreach($weekDays as $weekDay): ?>
                <th><?= $weekDay ?></th>
                <?php endforeach; ?>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        //bloucle initialisé à true
                        $loop = true;
                        //compteur de cellule(s)
                        $cell = 1;
                        //compteur de jour(s)
                        $day = 1;
                        //nombre de cellules requises pour le tableau
                        $requiredCells = $daysinMont + $firstDayinMonthinWeek -1;
                        while($loop){
                           //si le jour ne commence pas un lundi ou si le nombre de cellules est supérieur au nombre de jours dans le mois, on fait des cellules vides
                            if($firstDayinMonthinWeek > $cell || $cell > $requiredCells){ ?>
                        <td class="bg-primary"></td>
                            <?php
                            }
                            //sinon on écrit le numéro du jour dans la cellule
                            else{ ?>
                                <td><?= $day ?></td>
                            <?php
                                $day++;
                            }
                            if($cell % 7 == 0){  //si le nombre de cellules est divisible par 7 (corresponodant au nb de jour de la semaine), 7, 14, 21, 28
                                  //si le nombre de cellule est supérieur au nombre de cellules requises, on arrête la boucleet on fait une nouvelle ligne
                                 if($cell >= $requiredCells){
                                    break;
                                }
                                ?>
                                </tr><tr>
                            <?php
                            }
                            //on incrémente le nombre de cellules
                            $cell++;

                        }
                    ?>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
        </div>
</main>
<?php include 'footer.php'; ?>
