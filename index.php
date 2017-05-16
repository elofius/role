<?php
//require('vue/gabarit.php');

if (filter_input(INPUT_GET,'perso',FILTER_SANITIZE_STRING)== NULL)
{
    require('vue/vueAccueil.php');
}else
{
    require('vue/vueCombat.php');
}
