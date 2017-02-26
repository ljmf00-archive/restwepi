<?php
/// "public/v1/npmap/index.php" -*- PHP -*-
///  Web-based REST API for Shell-Web, a web-based App
///  _____  ______  _____ _________          __        _
/// |  __ \|  ____|/ ____|__   __\ \        / /       (_)
/// | |__) | |__  | (___    | |   \ \  /\  / /__ _ __  _
/// |  _  /|  __|  \___ \   | |    \ \/  \/ / _ \ '_ \| | | @repo github.com:ljmf00/restwepi.git
/// | | \ \| |____ ____) |  | |     \  /\  /  __/ |_) | | | @author Luís Ferreira
/// |_|  \_\______|_____/   |_|      \/  \/ \___| .__/|_| | @license GNU Public License v3
///                                             | |
///                                             |_|
///  Copyright (c) 2016 - Luís Ferreira. All right reserved
///  More information in: https://github.com/ljmf00/ (Github Page)

/// This file is part of the Shell-Web. This framework is free
/// software; you can redistribute it and/or modify it under the
/// terms of the GNU Lesser General Public License, v3.

header('Content-Type: text/plain');

// set the default timezone (CET / UTC)
date_default_timezone_set('UTC');

//Turn on errors only
error_reporting(E_ERROR);

$WBNMAP_MAJOR_VERSION=1;
$WBNMAP_MINOR_VERSION=1;

/**
** $WBNMAP_BUILD_VERSION can be:
**  - 0 for alpha (status)
**  - 1 for beta (status)
**  - [2-8] for release candidates
**  - 9 for (final) release
*/
$WBNMAP_BUILD_VERSION=0;
$WBNMAP_REVISION_VERSION=0;

if($argv==NULL) {
    //Webservice (GET Methods)
    $WBNMAP_HOSTS=$_GET['q'];
    $WBNMAP_PORTS=$_GET['p'];
}
else {
    //CLI (arguments)
    $WBNMAP_HOSTS=$argv[1];
    $WBNMAP_PORTS=$argv[2];
}

$WBNMAP_HAVE_PORTS_OPEN=false;

if ($WBNMAP_HOSTS == NULL) exit;
if (gethostbyname($WBNMAP_HOSTS)!=$WBNMAP_HOSTS) $address=gethostbyname($WBNMAP_HOSTS);

echo(
    "Starting Web-based Nmap $WBNMAP_MAJOR_VERSION.$WBNMAP_MINOR_VERSION.$WBNMAP_BUILD_VERSION".
    (($WBNMAP_REVISION_VERSION > 0) ? "-rev$WBNMAP_REVISION_VERSION" : '') .
    " (" .
    (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 'https://' : 'http://') .$_SERVER['SERVER_NAME'] . '/') ) .
    ') at '.
    date('Y-m-d H:i'). ' CET'.
    PHP_EOL
);
echo(
    "Nmap scan report for $WBNMAP_HOSTS ".
    ((isset($address)) ? ('('. $address . ')') : '' ).
    PHP_EOL
);

echo(PHP_EOL);
//65535
$top10port= array(21, 22, 25, 80, 443, 3389);

echo("PORT\tSTATE". PHP_EOL);
foreach ($top10port as $val) {
    if(fsockopen(((isset($address)) ? $address : $WBNMAP_HOSTS ), $val, $errno, $errstr, 1))
    {
        if(!$WBNMAP_HAVE_PORTS_OPEN) $WBNMAP_HAVE_PORTS_OPEN=true;
        echo (
                "$val\topen".
                PHP_EOL
        );
    }
    else
    {
        echo (
                "$val\tclose".
                PHP_EOL
        );
    }
}


exit;
?>
