<html>
<head>
<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
<center>
<h1>�� �ۼ��ϱ�</h1>
	<form name="write" action="src/board/boardwrite.php" method="post">
	<table cellspacing="5" cellpadding="3">
		<tbody>
			<tr>
				<td class="label">
					�� ���� : 
				</td>
				<td>
					<input type="text" id="inputtitle" name="title"/>
				</td>
			</tr>
			<tr>
				<td class="label">
					�� ���� :
				</td>
				<td>
					<textarea name="contents" id="inputcontents" cols="50" rows="20"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="�۾���"/>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</center>
</body>
</html>

