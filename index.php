<pre><?php
	require "theveil.class.php";
$theVeil = new theVeil;
// if(theVeil::$users->newUser('rond', 110694))
// theVeil::$users->postCountById(0);
// var_dump(theVeil::$posts->loadThread(1));
var_dump(theVeil::$posts->loadLatestThreads(3));
