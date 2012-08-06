<html>
<head>
<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
<center>
<h1>글 작성하기</h1>
	<form name="write" action="src/board/boardwrite.php" method="post">
	<table cellspacing="5" cellpadding="3">
		<tbody>
			<tr>
				<td class="label">
					글 제목 : 
				</td>
				<td>
					<input type="text" id="inputtitle" name="title"/>
				</td>
			</tr>
			<tr>
				<td class="label">
					글 내용 :
				</td>
				<td>
					<textarea name="contents" id="inputcontents" cols="50" rows="20"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="글쓰기"/>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</center>
</body>
</html>

