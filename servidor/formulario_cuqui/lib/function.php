<?php
/**
 * 
 * 
 * 
 * 
 */

function clearData($aData)
{
    $aData = trim($aData);
    $aData = stripcslashes($aData);
    $aData = htmlspecialchars($aData);
    return $aData;
};