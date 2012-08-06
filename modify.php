<?php
	
	include 'src/dbconnector/connection.php';
 	$conn = dbConnect();
	mysql_select_db("board", $conn);
	$query = "SELECT title,contents FROM board WHERE id='$_GET[no]'";
	$result = mysql_query($query, $conn) or die(mysql_error());
	$row = mysql_fetch_array($result);
?>

<head>
<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<center>
<h1>글 수정하기</h1>


				
<form name="modify" action="src/board/boardmodify.php?no=<?=$_GET[no]?>" method="post">
<table cellspacing="5" cellpadding="3">
		<tbody>
			<tr>
				<td class="label">
					글 제목 : 
				</td>
				<td>
					<input type="text" name="title" id="inputtitle" value="<?=$row[title]?>"/><br>
				</td>
			</tr>
			<tr>
				<td class="label">
					글 내용 :
				</td>
				<td>
					<textarea name="contents" id="inputcontents" cols="50" rows="20"><?=$row[contents]?></textarea><br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="수정하기"/>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</center>
</body>




	
	