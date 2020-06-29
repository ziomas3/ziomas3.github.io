<?php
include "baza.php";

$wynik=$baza->query("select * from osoby");

echo "<table>";
echo "<h2>Lista osób</h2>";
echo "<tr><th>Id<th>Imię</th><th>Nazwisko</th><th>Płeć</th><th>Opis</th>";
while($r= $wynik->fetchArray())
{   
	echo "<tr onclick=\"location='?id=$r[id]'\">
			<td>$r[id]</td>
			<td>$r[imie]</td>
			<td>$r[nazwisko]</td>
			<td>$r[plec]</td>
			<td>$r[opis]</td></tr>";
}
if($_SESSION['admin'])
	echo "<tr onclick=\"location='?id=dodaj'\">
		<td colspan=5>Dodaj nową osobę</td></tr>";
else
	echo "<tr onclick=\"location='?id=login'\">
		<td colspan=5>Zaloguj sie by edytować tabelę</td></tr>";

echo "</table>";
if($_SESSION['admin'])
   echo "<a href=?id=logout>Wyloguj się</a>";
