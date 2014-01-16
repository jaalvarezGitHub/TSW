<?php
class obtenerPaisComponent extends Component{
	function getPais($ip){
		$dbh = mysql_connect("localhost", "root", "reverse") or die("Could not connect: " . mysql_error());
		mysql_select_db("corto");

		$country_query = "SELECT country2, country FROM ip2country WHERE ipFrom<=INET_ATON('" . $ip . "') AND ipTo>=INET_ATON('" . $ip . "');";

		$country_exec = mysql_query($country_query);
		$ccode_array = mysql_fetch_array($country_exec);
		mysql_close($dbh);

		$country_code = $ccode_array['country2'];
		$country_name = $ccode_array['country'];

		return $country_name;
}
}
?>
