<?php
/// "v1/dig/index.php" -*- PHP -*-
///  Web-based Shell in Javascript
///    _________.__           .__  .__             __      __      ___.
///   /   _____/|  |__   ____ |  | |  |           /  \    /  \ ____\_ |__
///   \_____  \ |  |  \_/ __ \|  | |  |    ______ \   \/\/   // __ \| __ \  | @repo github.com:ljmf00/shell-web.git
///   /        \|   Y  \  ___/|  |_|  |__ /_____/  \        /\  ___/| \_\ \ | @author Luís Ferreira
///  /_______  /|___|  /\___  >____/____/           \__/\  /  \___  >___  / | @license GNU Public License v3
///          \/      \/     \/                           \/       \/    \/
///  Copyright (c) 2016 - Luís Ferreira. All right reserved
///  More information in: https://github.com/ljmf00/ (Github Page)

/// This file is part of the Shell-Web. This framework is free
/// software; you can redistribute it and/or modify it under the
/// terms of the GNU Lesser General Public License, v3.

header('Content-Type: text/plain');
$host=$_GET["q"];
$type=strtolower($_GET["t"]);

switch ($type)
{
	case strtolower("any"): $type=DNS_ANY; break;
	case strtolower("a"): $type=DNS_A; break;
	case strtolower("aaaa"): $type=DNS_AAAA; break;
	case strtolower("cname"): $type=DNS_CNAME; break;
	case strtolower("hinfo"): $type=DNS_HINFO; break;
	case strtolower("caa"): $type=DNS_CAA; break;
	case strtolower("mx"): $type=DNS_MX; break;
	case strtolower("ns"): $type=DNS_NS; break;
	case strtolower("ptr"): $type=DNS_PTR; break;
	case strtolower("soa"): $type=DNS_SOA; break;
	case strtolower("txt"): $type=DNS_TXT; break;
	case strtolower("srv"): $type=DNS_SRV; break;
	case strtolower("naptr"): $type=DNS_NAPTR; break;
	case strtolower("a6"): $type=DNS_A6; break;
	default:
		$type=DNS_ANY;
}

$result = dns_get_record($host, $type, $authns, $addtl);
// debug only
//print_r($result);
foreach($result as $result) {
	if ($result['pri']=="") {}
	else if ($result['pri']==NULL){}
	else {
		$resultpri= $result['pri'] . " ";
	}
	if ($result['type']=="SOA") {
		echo $result['host'],
		".	", $result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	",$result['mname'],
		" ", $result['rname'],
		" ", $result['serial'],
		" ", $result['refresh'],
		" ", $result['retry'],
		" ", $result['expire'],
		" ", $result['minimum-ttl'] ,
		"\n";
	}
	else if ($result['type']=="TXT") {
		echo $result['host'],
		".	", $result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	",
		'"' ,
		$result['txt'],
		'"',
		"\n";
	}
	else if ($result['type']=="A") {
		echo $result['host'],
		".	", $result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	", $result['ip'],
		"\n";
	}
	else if ($result['type']=="AAAA") {
		echo $result['host'],
		".	", $result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	", $result['ipv6'],
		"\n";
	}
	else if ($result['type']=="NAPTR") {
		echo $result['host'],
		".	", $result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	", $result['order'],
		" ", $result['pref'],
		" ", $result['flags'],
		" ", $result['services'],
		" ", $result['regex'],
		" ", $result['replacement'],
		"\n";
	}
	else {
		echo $result['host'],
		".	",
		$result['ttl'],
		"	", $result['class'],
		"	", $result['type'],
		"	", $result['ip'],
		$result['ipv6'],
		$result['mname'],
		$result['txt'],
		$resultpri,
		$result['target'],
		$result['cpu'],
		" ", $result['rname'],
		$result['os'],
		" ", $result['serial'],
		" ", $result['refresh'],
		" ", $result['retry'],
		" ", $result['expirate'],
		" ", $result['minimum-ttl'],
		"\n";
	}
}

exit;
?>
