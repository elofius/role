<?php
//require('vue/gabarit.php');

if (!isset($_GET['perso']))
{
    require('vue/vueAccueil.php');
}else
{
    require('vue/vueCombat.php');
}
