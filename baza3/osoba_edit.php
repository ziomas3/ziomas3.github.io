<?php
	include "baza.php";
	$id=intval($_GET['id']);
	$wynik=$baza->query("select * from osoby where id='$id'");
    $r=$wynik->fetchArray();
?>
<form method='post' action='osoba_zmiana.php'>
	<h2>Edycja osoby</h2>

	<input name='id' type=hidden value='<?=htmlentities($r['id'])?>'>
	<input name='imie' placeholder='Imię' value='<?=htmlentities($r['imie'])?>'>
	<input name='nazwisko' placeholder='Nazwisko'  value='<?=htmlentities($r['nazwisko'])?>'>
	
	<select name='plec' placeholder='Płeć'>
		<option value=''>Płeć:</option>
		<option value='m' <?php if($r['plec']=='m') echo 'selected' ;?>>Mężczyzna</option>
		<option value='k' <?php if($r['plec']=='k') echo 'selected' ;?>>Kobieta</option>
	</select>

	<textarea name='opis' placeholder='Opis'><?=htmlentities($r['opis'])?></textarea>

	<input type=submit name=co value='Zapisz'>
	<input type=submit name=co value='Usun'>
	<input type=submit name=co value='Anuluj'>
</form>
