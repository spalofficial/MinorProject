<?php

  if ($_SESSION['levels']>1)
  {
	  $rd=True;
	  $ed=False;
	  $dd=False;
	  $id=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rd=True;
	  $ed=True;
	  $dd=True;
	  $id=True;
	  }
	  else{
	  $rd=True;
	  $ed=$_SESSION['e'];
	  $dd=$_SESSION['d'];
	  $id=$_SESSION['i'];
	  }
  }
  
 /////////////////////////////////////
 if ($_SESSION['levels']<2)
  {
	  $rc=False;
	  $ec=False;
	  $dc=False;
	  $ic=False;
  }
  else if ($_SESSION['levels']>2)
  {
	  $rc=True;
	  $ec=False;
	  $dc=False;
	  $ic=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rc=True;
	  $ec=True;
	  $dc=True;
	  $ic=True;
	  }
	  else{
	  $rc=True;
	  $ec=$_SESSION['e'];
	  $dc=$_SESSION['d'];
	  $ic=$_SESSION['i'];
	  }
  }
  
 /////////////////////////////////////
 if ($_SESSION['levels']<3)
  {
	  $rm=False;
	  $em=False;
	  $dm=False;
	  $im=False;
  }
  else if ($_SESSION['levels']>3)
  {
	  $rm=True;
	  $em=False;
	  $dm=False;
	  $im=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rm=True;
	  $em=True;
	  $dm=True;
	  $im=True;
	  }
	  else{
	  $rm=True;
	  $em=$_SESSION['e'];
	  $dm=$_SESSION['d'];
	  $im=$_SESSION['i'];
	  }
  }
  
 /////////////////////////////////////
 
  if ($_SESSION['levels']<4)
  {
	  $rse=False;
	  $ese=False;
	  $dse=False;
	  $ise=False;
  }
  else if ($_SESSION['levels']>4)
  {
	  $rse=True;
	  $ese=False;
	  $dse=False;
	  $ise=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rse=True;
	  $ese=True;
	  $dse=True;
	  $ise=True;
	  }
	  else{
	  $rse=True;
	  $ese=$_SESSION['e'];
	  $dse=$_SESSION['d'];
	  $ise=$_SESSION['i'];
	  }
  }
  
 /////////////////////////////////////
if ($_SESSION['levels']<5)
  {
	  $rt=False;
	  $et=False;
	  $dt=False;
	  $it=False;
  }
  else if ($_SESSION['levels']>5)
  {
	  $rt=True;
	  $et=False;
	  $dt=False;
	  $it=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rt=True;
	  $et=True;
	  $dt=True;
	  $it=True;
	  }
	  else{
	  $rt=True;
	  $et=$_SESSION['e'];
	  $dt=$_SESSION['d'];
	  $it=$_SESSION['i'];
	  }
  }
  //////////////////////////////////////
   if ($_SESSION['levels']<6)
  {
	  $re=False;
	  $ee=False;
	  $de=False;
	  $ie=False;
  }
  else if ($_SESSION['levels']>6)
  {
	  $re=True;
	  $ee=False;
	  $de=False;
	  $ie=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $re=True;
	  $ee=True;
	  $de=True;
	  $ie=True;
	  }
	  else{
	  $re=True;
	  $ee=$_SESSION['e'];
	  $de=$_SESSION['d'];
	  $ie=$_SESSION['i'];
	  }
  }
  
 /////////////////////////////////////
 if ($_SESSION['levels']<7)
  {   
      $rs=False;
	  $es=False;
	  $ds=False;
	  $is=False;
  }
  else if ($_SESSION['levels']>7)
  {   
      $rs=True;
	  $es=False;
	  $ds=False;
	  $is=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $rs=True;
	  $es=True;
	  $ds=True;
	  $is=True;	  
	  }
	  else{	  
	  $rs=True;
	  $es=$_SESSION['e'] ;
	  $ds=$_SESSION['d'] ;
	  $is=$_SESSION['i'] ;
	  }
  }
  
 /////////////////////////////////////
 
   if ($_SESSION['levels']<8)
  {
	  $ra=False;
	  $ea=False;
	  $da=False;
	  $ia=False;
  }
  else if ($_SESSION['levels']>8)
  {
	  $ra=True;
	  $ea=False;
	  $da=False;
	  $ia=False;
  }
  else
  {
	  if($_SESSION['levels'] == $_SESSION['oldlevel'] ){	
	  $ra=True;
	  $ea=True;
	  $da=True;
	  $ia=True;
	  }
	  else{
	  $ra=True;
	  $ea=$_SESSION['e'];
	  $da=$_SESSION['d'];
	  $ia=$_SESSION['i'];
	  }
  }
  