<head>
<link rel="stylesheet" href="css/style.css"/>
</head>
<?php

	include 'src/dbconnector/connection.php';
 	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$query = "SELECT title,contents FROM board WHERE id=".$_GET[no];
	//echo $query;
	$result = mysql_query($query, $conn) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$comm_query = "SELECT contents FROM comment WHERE board_id=".$_GET[no]." ORDER BY id asc";
	//echo $comm_query;
	$comm_result = mysql_query($comm_query);
	//$comm_row = mysql_fetch_array($comm_result);
	$comm_total = mysql_num_rows($comm_result);
	
	
?>

<center>
<h1>글 읽기</h1>
<table border="1">
	<tr>
		<td width="200" align="center">제목</td>
		<td width="500" align="center"><?=$row[title]?></td>
	</tr>
	<tr>
		<td align="center">내용</td>
		<td height="450" align="center"><?=$row[contents]?></td>
	</tr>
	<?php 
		if($comm_total == 0){
	?>
	<tr>
		<td colspan="2">댓글이 없습니다.</td>
	</tr>
	<?php 
		}else{
			for($i=0; $i<$comm_total; $i++){
				$contents = mysql_result($comm_result, $i, 0);
			
	?>
	<tr>
		<td colspan="2"><?=$contents?></td>
	</tr>
	<?php 
		
			}
		}
	?>
	
	<tr>
	<form name="comment" action="src/board/boardcomment.php?no=<?=$_GET[no]?>&page=<?=$_GET[page]?>" method="post">
		<td align="center">댓글</td>
		<td align="center">
			<textarea name="contents"></textarea>
			<input type="submit" value="댓글쓰기"/>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="right">
			<a href="index.php?page=<?=$_GET[page]?>">목록</a>&nbsp;&nbsp; 
			<a href="model/boarddelete.php?no=<?=$_GET[no]?>">삭제</a>&nbsp;&nbsp; 
			<a href="modify.php?no=<?=$_GET[no]?>">수정</a>
		</td>
	</tr>
</table>
</center>