<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);

function dateFormatSQL($date)
{
	$day = substr($date, 0, 2);
	$month = substr($date, 3, 2);
	$year = substr($date, 6, 4);
	return $year . "-" . $month . "-" . $day;
}

function dateFormat($date)
{
	$day = substr($date, 8, 2);
	$month = substr($date, 5, 2);
	$year = substr($date, 0, 4);
	return $day . "-" . $month  . "-" . $year;
}

function flightType($type)
{
	if ($type === 'multipleDestinations') {
		return '<h5><span class="badge badge-primary">Multiple destinations</span></h5>';
	} elseif ($type === 'recurrent') {
		return '<h5><span class="badge badge-secondary">Recurrent</span></h5>';
	} elseif ($type === 'oneWay') {
		return '<h5><span class="badge badge-info">One way</span></h5>';
	}
}


function flash($type, $flash_heading, $flash_msg)
{

	if ($type == 'success') {

		$type = 'success-flash';
	} elseif ($type == 'warning') {

		$type = 'warning-flash';
	} elseif ($type == 'error') {

		$type = 'error-flash';
	} elseif ($type == 'info') {

		$type = 'info-flash';
	} elseif ($type == 'secondary') {

		$type = 'secondary-flash';
	}



	$template = '<div class="flash ' . $type . '">';
	$template .=    '<span class="remove">&times;</span>';
	$template .=        '<div class="flash-heading">';
	$template .=            '<h5>' . $flash_heading . '</h5>';
	$template .=        '</div>';
	$template .=        '<div class="flesh-body">';
	$template .=           '<p>' . $flash_msg . '</p>';
	$template .=        '</div>';
	$template .= '</div>';

	return $template;
}
