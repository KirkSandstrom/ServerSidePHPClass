<?php
//HTTP_USER_AGENT
echo "<strong>HTTP_USER_AGENT:</strong>";
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo "<p>This is a useful variable because it allows the script to determine the browser of the user. The script can then react and adapt to better serve the user.</p>";
echo "<br>";
echo "<br>";
//REMOTE_ADDR
echo "<strong>REMOTE_ADDR:</strong>";
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
echo "<p>This is a useful variable because it allows the script to determine the IP address of the user viewing the current page. With this knowledge, you can track users that visit your site, and even adapt your site to react to various IP addresses differently.</p>";
echo "<br>";
echo "<br>";
//REMOTE_PORT
echo "<strong>REMOTE_PORT:</strong>";
echo "<br>";
echo $_SERVER['REMOTE_PORT'];
echo "<br>";
echo "<p>If you want to track users that visit your site, it is also important to track the port they are using to access the site. </p>";
echo "<br>";
echo "<br>";
//REQUEST_URI
echo "<strong>REQUEST_URI:</strong>";
echo "<br>";
echo $_SERVER['REQUEST_URI'];
echo "<br>";
echo "<p>It is useful to know the Request URI if you want to know the page that gave a user access to the running script.</p>";
echo "<br>";
echo "<br>";
//QUERY_STRING
echo "<strong>QUERY_STRING:</strong>";
echo "<br>";
echo $_SERVER['QUERY_STRING'];
echo "<br>";
echo "<p>Logging the QUERY_STRING is useful for security reasons, being able to check if users are attempting to pass malicious code through GET requests gives you an advantage in protecting your site from hackers.</p>";
?>