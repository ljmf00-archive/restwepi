<?php

?>
<!DOCTYPE html>

<!--
    "index.php" -*- PHP -*-
    Web-based REST API for Shell-Web, a web-based App
     _____  ______  _____ _________          __        _
    |  __ \|  ____|/ ____|__   __\ \        / /       (_)
    | |__) | |__  | (___    | |   \ \  /\  / /__ _ __  _
    |  _  /|  __|  \___ \   | |    \ \/  \/ / _ \ '_ \| | | @repo github.com:ljmf00/restwepi.git
    | | \ \| |____ ____) |  | |     \  /\  /  __/ |_) | | | @author Luís Ferreira
    |_|  \_\______|_____/   |_|      \/  \/ \___| .__/|_| | @license GNU Public License v3
                                                | |
                                                |_|
    Copyright (c) 2016 - Luís Ferreira. All right reserved
    More information in: https://github.com/ljmf00/ (Github Page)

    This file is part of the Shell-Web. This framework is free
    software; you can redistribute it and/or modify it under the
    terms of the GNU Lesser General Public License, v3.
-->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>RESTWePI &bull; Web-based REST API</title>
    </head>

    <body>
<pre>
 _____  ______  _____ _________          __        _
|  __ \|  ____|/ ____|__   __\ \        / /       (_)
| |__) | |__  | (___    | |   \ \  /\  / /__ _ __  _
|  _  /|  __|  \___ \   | |    \ \/  \/ / _ \ '_ \| |
| | \ \| |____ ____) |  | |     \  /\  /  __/ |_) | |
|_|  \_\______|_____/   |_|      \/  \/ \___| .__/|_|
                                            | |
                                            |_| <?php ($RWEPI_LITE) ? 'Lite' : '' ?>
    <ul><b>Commands:</b></br>
<li><b>v1/dig</b> - DiG (Domain information Groper)</br>?q=(address)&t=[type]&nbsp;<b><a href="v1/dig/?q=google.com&t=any">example</a></b></li>
<li><b>v1/npmap</b> - NPmap (Network Port mapper)</br>?q=(address)&nbsp;<b><a href="v1/npmap/?q=google.com">example</a></b></li>
    </ul>
</pre>
    </body>
</html>
