<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function toRp($angka)
{
 $rp = number_format($angka,2,',','.');
 return $rp;
}

function datetime($datetime)
{
  $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
  return $datetime->format('d-m-Y H:i:s');
}

function tosql($tgl)
{
  $tgl = DateTime::createFromFormat('d-m-Y', $tgl);
  return $tgl->format('Y-m-d');
}

function todate($tgl)
{
  $tgl = DateTime::createFromFormat('Y-m-d', $tgl);
  return $tgl->format('d-m-Y');
}
