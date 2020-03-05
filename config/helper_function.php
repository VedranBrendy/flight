<?php 

function datumHRuSQL($hrDatum) {
	$dan = substr($hrDatum,0,2);
	$mjesec = substr($hrDatum,3,2);
	$godina = substr($hrDatum,6,4);
	return $godina."-".$mjesec."-".$dan;
}

?>