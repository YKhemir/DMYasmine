<?php


function calcul_jour_ferier($datedebut, $datefin, $soldesConges) {
   $dateDebut = date_create($datedebut);
   $dateFin = date_create($datefin);
   $nbreOfDay = date_diff($dateDebut, $dateFin)->days;

   $jourOuvree = 0;
   $compteurDateConge = $dateDebut;

   for ($i = 0; $i <= $nbreOfDay; $i++) {
       $compteurTimestamp = $compteurDateConge->getTimestamp();
       $jourDeLaSemaine = date('w', $compteurTimestamp);

       if ($jourDeLaSemaine != 0 && $jourDeLaSemaine != 6 && !isholiday($compteurTimestamp)) {
           $jourOuvree++;
       }

       $compteurDateConge->modify('+1 day');
   }

   // Vérifier si l'employé a suffisamment de soldes de congés
   $joursManquants = max(0, $jourOuvree - $soldesConges);

   if ($joursManquants > 0) {
       return "Vous n'avez pas assez de soldes de congés. Jours manquants : $joursManquants";
   } else {
       return "$datedebut a $datefin --> $jourOuvree jours de conges";
   }
}

// Example usage:
$datedebut = "12-07-2023";
$datefin = "19-07-2023";
$soldesConges = 8;
echo calcul_jour_ferier($datedebut, $datefin, $soldesConges);
?>
