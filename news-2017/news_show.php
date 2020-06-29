<?php
include_once "baza.php";

if( $id=intval($_GET['id']))
    $where = " id='$id' ";
else
if( $main=intval($_GET['main']) )
    $where = " main='1' ";
else $where = " pokaz order by id desc limit 6";

//Pobierz dane artykułu o podanym id lub artykułów ze strony głównej
$results = $db->query("SELECT * FROM news where $where");

while($row = $results->fetchArray()) 
{
   if($res=$db->query("SELECT * FROM user WHERE id='$row[autor]'")) 
       $a= $res->fetchArray(); // Znajdż dane autora

    echo "<div class='news' id='news$row[id]'>";// otwórz ramkę artykułu
    
        if($me and ($me==$row['autor'] or $_SESSION['rola']>1)) 
        {   //link do edycji
            echo "<a class='edit' href='#news_edit.php?id=$row[id]'>Edit</a>";
        }
        echo "<i class='kat'>$row[kategoria]</i>";   // kategoria
        echo "<h3 class='tytul'>$row[tytul]</h3>";   // tytuł
        echo "<div class='skrot'>$row[skrot]</div>"; // streszczenie
        echo "<div class='tekst'>$row[tekst]</div>"; // treść
        echo "<i class='autor'>$a[imie] $a[nazwisko]</i>";// autor 
        echo "<i class='date'>$row[aktualizacja]</i></div>";// data aktualizacji
    echo "<div style='clear:both'></div>";
    echo "</div>"; // Zamknij ramkę

}
