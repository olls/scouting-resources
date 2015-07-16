<html>
	<body style="font-family: Arial, Helvetica, sans-serif;">
		<?php
			$mysql_host	=	"mysql2.000webhost.com";
			$username	=	"a8613955_login";
			$password	=	"oops";
			$database	=	"a8613955_login";

			mysql_connect($mysql_host,$username,$password);
			@mysql_select_db($database) or die( "Unable to select database");
			$query	=	"SELECT * FROM content";
			$result	=	mysql_query($query);

			$num	=	mysql_num_rows($result);

			mysql_close();
		?>
		<table border="1" width="100%" cellspacing="2" cellpadding="2" style="text-align: center;">
			<tr>
				<th>
					ID:
				</th>
				<th>
					Title:
				</th>
				<th>
					Description:
				</th>
				<th>
					Author:
				</th>
				<th>
					Permissions*
				</th>
			</tr>

			<?php
				$i	=	0;
				while ($i < $num) {

					$f1	=	mysql_result($result,$i,"id");
					$f2	=	mysql_result($result,$i,"title");
					$f3	=	mysql_result($result,$i,"description");
					$f4	=	mysql_result($result,$i,"author");
					$f5	=	mysql_result($result,$i,"login");
			?>

			<tr>
				<td>
					<?php
						echo $f1;
					?>
				</td>
				<td>
					<a href="anypage.php?linkto=<? echo $f2; ?>" target="_perent">
						<?php
							echo $f2;
						?>
					</a>
				</td>
				<td>
					<?php
						echo $f3;
					?>
				</td>
				<td>
					<?php
						echo $f4;
					?>
				</td>
				<td>
					<?php
						echo $f5;
					?>
				</td>
			</tr>
			<?php
					$i++;
				}
			?>
		</table>
		<p>* 0=Guest, 1=Registered, 2=Admin</p>
	</head>
</html>

