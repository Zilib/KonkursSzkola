<?php
get_header();
global $wp_query;
if(get_query_var('year'))
  $Rok = get_query_var('year');
if(get_query_var('monthnum'))
  $Miesiac = get_query_var('monthnum');
if(isset($_GET['tag']))
	$Tag = $_GET['tag'];

    $NazwaMiesiaca = array(
    "styczeń",
    "luty",
    "marzec",
    "kwiecień",
    "maj",
    "czerwiec",
    "lipiec",
    "sierpień",
    "wrzesień",
    "październik",
    "listopad",
    "grudzień"
  );
   $WynikiWyszukiwania = $wp_query->found_posts; 
   $SlowoKlucz = get_search_query();
    if(get_query_var("Strona")==1822)
    {
        if($SlowoKlucz != '' && !$Rok && !$Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"',
            'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"');
        else if ($SlowoKlucz != '' && $Rok && !$Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku '.$Rok,
           'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Pochodzącym z roku '.$Rok);
        else if ($SlowoKlucz != '' && $Rok && $Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku '.$Rok.' i miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z roku '.$Rok.' i miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
        else if ($SlowoKlucz != '' && !$Rok && $Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
         $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z miesiąca '.$NazwaMiesiaca[$Miesiac-1],
         'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z miesiąca '.$NazwaMiesiaca[$Miesiac-1]
       );
        else if ($SlowoKlucz == '' && $Rok && $Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
        else if ($SlowoKlucz == '' && $Rok && !$Miesiac && $Tag == '')
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z roku szkolnego '.$Rok.'/'.($Rok+1),
           'Nie odnaleziono żadnych albumów z roku szkolnego '.$Rok.'/'.($Rok+1)
         );
        else if ($SlowoKlucz == '' && !$Rok && $Miesiac && !$Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych albumów z miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
      /// Dla tagów
          else if ($SlowoKlucz != '' && !$Rok && !$Miesiac && $Tag)
          	WyszukiwarkaGaleria($wp_query,
		 $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />oraz tagami: '.$Tag,
            'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"" oraz tagami: '.$Tag);
        else if ($SlowoKlucz != '' && $Rok && !$Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku '.$Rok.'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Pochodzącym z roku '.$Rok.'"<br />oraz tagami: '.$Tag);
        else if ($SlowoKlucz != '' && $Rok && $Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku '.$Rok.' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z roku '.$Rok.' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz != '' && !$Rok && $Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
         $WynikiWyszukiwania.' odnalezionych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
         'Nie odnaleziono żadnych albumów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
       );
        else if ($SlowoKlucz == '' && $Rok && $Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz == '' && $Rok && !$Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów z roku szkolnego '.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz == '' && !$Rok && $Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
       else if ($SlowoKlucz == '' && !$Rok && !$Miesiac && $Tag)
          WyszukiwarkaGaleria($wp_query,
           $WynikiWyszukiwania.' odnalezionych albumów z tagami: '.$Tag,
           'Nie odnaleziono żadnych albumów z oraz tagami: '.$Tag
         );
        else
          WyszukiwarkaGaleria($wp_query,
            $WynikiWyszukiwania.' odnalezionych albumów',
            'Nie odnaleziono żadnych albumów'
          );
    }
     else if(!get_query_var("Strona") && isset($Rok) && isset($Miesiac) && isset($Tag))
     {
      if($SlowoKlucz != '' && !$Rok && !$Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz,
            'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"');
        else if ($SlowoKlucz != '' && $Rok && !$Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku szkolnego'.$Rok.'/'.($Rok+1),
           'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Pochodzącym z roku szkolnego'.$Rok.'/'.($Rok+1));
        else if ($SlowoKlucz != '' && $Rok && $Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku szkolnego'.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z roku szkolnego'.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
        else if ($SlowoKlucz != '' && !$Rok && $Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
         $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z miesiąca '.$NazwaMiesiaca[$Miesiac-1],
         'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z miesiąca '.$NazwaMiesiaca[$Miesiac-1]
       );
        else if ($SlowoKlucz == '' && $Rok && $Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
        else if ($SlowoKlucz == '' && $Rok && !$Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1),
           'Nie odnaleziono żadnych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1)
         );
        else if ($SlowoKlucz == '' && !$Rok && $Miesiac && !$Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z miesiąca '.$NazwaMiesiaca[$Miesiac-1],
           'Nie odnaleziono żadnych wpisów z miesiąca '.$NazwaMiesiaca[$Miesiac-1]
         );
      // Dla tagów
           else if($SlowoKlucz != '' && !$Rok && !$Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"'.'"<br />oraz tagami: '.$Tag,
            'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"'.'"<br />oraz tagami: '.$Tag);
        else if ($SlowoKlucz != '' && $Rok && !$Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku szkolnego'.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Pochodzącym z roku szkolnego'.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag);
        else if ($SlowoKlucz != '' && $Rok && $Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z roku szkolnego'.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z roku szkolnego'.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz != '' && !$Rok && $Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
         $WynikiWyszukiwania.' odnalezionych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br />Z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
         'Nie odnaleziono żadnych wpisów ze słowem kluczowym "'.$SlowoKlucz.'"<br /> Pochodzącym z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
       );
        else if ($SlowoKlucz == '' && $Rok && $Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).' i miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz == '' && $Rok && !$Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów z roku szkolnego '.$Rok.'/'.($Rok+1).'"<br />oraz tagami: '.$Tag
         );
        else if ($SlowoKlucz == '' && !$Rok && $Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów z miesiąca '.$NazwaMiesiaca[$Miesiac-1].'"<br />oraz tagami: '.$Tag
         );
      else if ($SlowoKlucz == '' && !$Rok && !$Miesiac && $Tag)
          WyszukiwarkaPosty($wp_query,
           $WynikiWyszukiwania.' odnalezionych wpisów z tagami: '.$Tag,
           'Nie odnaleziono żadnych wpisów z oraz tagami: '.$Tag
         );
        else
          WyszukiwarkaPosty($wp_query,
            $WynikiWyszukiwania.' odnalezionych wpisów',
            'Nie odnaleziono żadnych wpisów'
          );
     }
     else{
      echo "Błędne dane w wyszukiwarce !";
     }
 get_footer(); ?>