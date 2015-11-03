<?php

/**
 * This file contains helper functions and definition.
 */

/** Definitions */
$ROOT = $_SERVER['DOCUMENT_ROOT']; // This should only be used for include/require
$DOMAIN = "http://".$_SERVER['SERVER_NAME']; // This should only be used for hrefs

/**
 * Checks the $page with $pageId and add 'active' class if matching
 */
function checkForActivePage($page)
{
    if ($page == $pageId)
        return " class='active' ";
}
