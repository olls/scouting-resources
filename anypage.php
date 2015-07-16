<!DOCTYPE html>






<?php
	include("login/include/session.php");


	$pagename = ($_GET["linkto"]);
	$not = '';




	if ($pagename == $not){
		echo 'There was a error while prossesing your request. Please try again.';
	}else{


		$mysql_host = "mysql2.000webhost.com";
		$mysql_database = "a8613955_login";
		$mysql_user = "a8613955_login";
		$mysql_password = "oops";


		mysql_connect("$mysql_host", "$mysql_user", "$mysql_password") or die(mysql_error());
		@mysql_select_db("$mysql_database") or die(mysql_error());


		$query = sprintf("SELECT * FROM content WHERE title='%s'",mysql_real_escape_string($pagename));


		$result = mysql_query($query)or die(mysql_error());


		$id=mysql_result($result,'0',"id");
		$title=mysql_result($result,'0',"title");
		$description=mysql_result($result,'0',"description");
		$author=mysql_result($result,'0',"author");
		$login=mysql_result($result,'0',"login");


		if ($login == '1'){
			if($session->logged_in){
				$content = mysql_result($result,'0',"content");
			}else{
				$content = mysql_result($result,'0',"login_error");
			}
		}else{
			if($login == '2'){
				if($session->isAdmin()){
					$content = mysql_result($result,'0',"content");
				}else{
					$content = mysql_result($result,'0',"login_error");
				}
			}else{
				$content = mysql_result($result,'0',"content");
			}
		}
?>
<html>
	<head>
		<title>
			Scout Resources -
			<?php
				echo $title;
			?>
		</title>
		<link rel="Stylesheet" type="text/css" href="stylesheet.css"/>
		<script language="JavaScript" type="text/javascript" src="js/jquery-1.6.1.min.js">
		</script>
		<script language="JavaScript" type="text/javascript">
			$('artical a').addClass('general');
			function autoResize(id){
				var newheight;
				var newwidth;
				if(document.getElementById){
					newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
					newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
				}
				document.getElementById(id).height= (newheight) + 20 + "px";
				document.getElementById(id).width= (newwidth) + 20 + "px";
			}
		</script>
	</head>
	<body>
		<div id="container">
			<header>
				<div id="header">
					<div id="title">
						title
					</div>
					<div id="pagetitle">
						<?php
							echo $title;
						?>
					</div>
					<div id="navigation">
						<nav>
							<ul class="buttonlist">
								<li class="buttonitem">
									<a href="anypage.php?linkto=home" class="buttonlink">
										home
									</a>
								</li>
								<li class="buttonitem">
									<a href="anypage.php?linkto=articals" class="buttonlink">
										articals
									</a>
								</li>
								<li class="buttonitem">
									<a href="anypage.php?linkto=contact us" class="buttonlink">
										contact us
									</a>
								</li>
							</ul>
						</nav>
					</div>
					<div id="about">
						<?php
							echo $description;
						?>
					</div>
					<div id="other">
						<iframe  src="login/main.php" width="370" height="230" scrolling="none" frameborder="0">
							Your browser does not support the features used to display this content.
						</iframe>
					</div>
				</div>
			</header>
			<div id="content">
				<div id="contenttext">
					<artical>
						<?php
							echo '<p>'.$content.'</p>';
							echo '<p id="author">By <a href="authors.php?name='.$author.'" rel="author">'.$author.'</a></p>';
						?>
					</artical>
				</div>
				<div id="rightborderadd">
					<a href="#anywhere" class="advertlink">
						<img class="advertvertical" src="ADVERT%20VERTICAL.png">
					</a>
				</div>
				<div id="footer">
					<footer>
						<div id="topfootertext">
							<a href="#top" class="general">
								Back to Top
							</a>
						</div>
						<div id="bottomfootertext">
							Copyright Scout Resources,
							<a href="http://scout-resources.hostoi.com" class="general">
								http://scout-resources.hostoi.com
							</a>
							2011
						</div>
					</footer>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>







