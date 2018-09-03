<?php
include_once 'lib/User_veryfication.php';
session_start();
$us = new User_veryfication(0, 0, 0, 0);
$us->loguot();
session_unset();
header("Location:index.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

