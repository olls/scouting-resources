<!DOCTYPE html>

<?php
	include("login/include/session.php");

	$title = $_POST["title"];
	$description = $_POST["description"];
	$content = $_POST["content"];
	$author = $session->username;

	$ptitle	=	'Robot Test';
	$pauthor	=	'admin';
?>
<html>
	<head>
		<title>
			Scout Resources - 
			<?php
				echo $ptitle;
			?>
		</title>
		<link rel="Stylesheet" type="text/css" href="stylesheet.css"/>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="title">
					title
				</div>
				<div id="pagetitle">
					<?php
						echo $ptitle;
					?>
				</div>
				<div id="navigation">
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
				</div>
				<div id="about">
					<p>
						Please compleate this reCAPTCHA to check if you are a robot.
					</p>
				</div>
				<div id="other">
					<iframe  src="login/main.php" width="370" height="230" scrolling="none" frameborder="0">
						Your browser does not support the features used to display this content.
					</iframe>
				</div>
			</div>
			<div id="content">
				<div id="contenttext">
					<div id="cse" style="width:100%;">
					</div>
					<p>
						<form action="action.php" method="post" name="create" style="text-align:center;">
							<?php
								require_once('recaptchalib.php');
								$publickey = "6LcGZ8USAAAAALp273iEjA0TY9yyxPCVnDz_EVzx";
								echo recaptcha_get_html($publickey);
							?>
							<input type="hidden" name="title" value="<? echo $title; ?>" />
							<input type="hidden" name="description" value="<? echo $description; ?>" />
							<input type="hidden" name="content" value="<? echo $content; ?>" />
							<input type="hidden" name="author" value="<? echo $author ?>" />
							<input type="hidden" name="type" value="createpage" />
							<button type="submit" style="width:100%;background-color:white;border-color:black;border-style:solid;border-width:1px;">
								Done! Create my page!
							</button>
						</form>
					</p>
					<?php
						echo '<p id="author">By <a href="authors.php?name='.$pauthor.'" rel="author">'.$pauthor.$author.'</a></p>';
					?>
				</div>
				<div id="rightborderadd">
					<a href="#anywhere" class="advertlink">
						<img class="advertvertical" src="ADVERT%20VERTICAL.png">
					</a>
				</div>
				<div id="footer">
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
				</div>
			</div>
		</div>
	</body>
</html>