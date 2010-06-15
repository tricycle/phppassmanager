<?php

function PrintHeader() {

        echo ("<DIV ALIGN=\"center\">");
        echo ("<H1>" . HTML_HEADER. "</H1>");
        echo ("</DIV>");
}

function PrintFooter() {


	echo ("<BR><BR>");
	echo ("<DIV ALIGN=\"center\">");
  echo ("<B>Users: </B>" . Users() . "<BR><BR>");
	echo ("<B>" . PROJECT_NAME . "</B>, Version " . PROJECT_VERSION . "<BR>");
	echo ("Copyright " . PROJECT_COPYRIGHT . " by " . PROJECT_AUTHOR . "<BR>");
	echo ("<A HREF=\"" . PROJECT_HP_GH . "\">GitHub</A>");
	echo ("</DIV>");
}

function Users() {
  $htpasswd = $_SERVER['DOCUMENT_ROOT'] . "/htpasswd-" . SITE_NAME;

  $lines = file($htpasswd);

  foreach ($lines as $line){
    if ( preg_match('/^#/', $line) == FALSE ) { 
      $data = preg_split("/:/", $line);
      $users .= $data[0]."";
      if ($data[0] == $_SERVER['PHP_AUTH_USER']) {
        $users .= " [<a href='/ppm_password_change.php'>change pass</a>]";
      }
      $users .= ", ";
    }
  }
  $users = preg_replace("/, $/", '', $users);
  return $users;
}

function StartRenderTimer() {

	$RenderStartTime = microtime();
	
}

function StopRenderTimer() {

	$RenderStopTime = microtime();
	$RenderTime = $RenderStopTime - $RenderStartTime;
	return $RenderTime;
}

function PrintRenderTime($RenderTime) {

	echo ("<BR>");
	echo ("<DIV ALIGN=\"center\">");
	echo ("<P CLASS=\"footer\">[ created in  ". $RenderTime . " seconds ]</P>");
	echo ("</DIV>");
}

?>
