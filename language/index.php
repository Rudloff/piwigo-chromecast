<?php
2	// +-----------------------------------------------------------------------+
3	// | Piwigo - a PHP based picture gallery                                  |
4	// +-----------------------------------------------------------------------+
5	// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
6	// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
7	// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
8	// +-----------------------------------------------------------------------+
9	// | This program is free software; you can redistribute it and/or modify  |
10	// | it under the terms of the GNU General Public License as published by  |
11	// | the Free Software Foundation                                          |
12	// |                                                                       |
13	// | This program is distributed in the hope that it will be useful, but   |
14	// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
15	// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
16	// | General Public License for more details.                              |
17	// |                                                                       |
18	// | You should have received a copy of the GNU General Public License     |
19	// | along with this program; if not, write to the Free Software           |
20	// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
21	// | USA.                                                                  |
22	// +-----------------------------------------------------------------------+
23
24	// Recursive call
25	$url = '../';
26	header( 'Request-URI: '.$url );
27	header( 'Content-Location: '.$url );
28	header( 'Location: '.$url );
29	exit();
30	?>
