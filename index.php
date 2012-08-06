
<?php session_start(); ?>

<html>
<head>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
	
	include 'src/dbconnector/connection.php';

	$conn = dbConnect();
	mysql_select_db("board", $conn);
	
	$page_set = 11;  // �� �������� 10���� ��
	$block_set = 5;  // �ִ� 5���� ����¡
	
	
	$query = "SELECT COUNT(id) AS total FROM board";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$total = $row[total];
	
	$total_page = ceil($total/$page_set);
	//echo "total_page: $total_page\n";
	$total_block = ceil($total_page/$block_set);
	//echo "<br>total_block: $total_block  ";
	
	
	$page = $_GET[page];
	//echo "paggggggg $page";
	
	$block = ceil($page/$block_set);  // �ø��Լ� ceil
	$limit_idx = ($page - 1) * $page_set; //1�������� 0, 2�信���� 5
	//echo "sdgsdg $limit_idx   ";
	
	// �� �������� ���� ������
	$query = "SELECT * FROM board ORDER BY id DESC LIMIT $limit_idx, $page_set";  //�ֽ� �� ���� ������ ������ �ϱ����� ORDER BY id DESC
	//echo "<br>$query";
	$postList = mysql_query($query) or die(mysql_error());  // ���� ����
	$rows = mysql_num_rows($postList);


?>

<div class="title">
	<span class="title_text">
		<a href="index.php?page=1">
		TEST BOARD V.1
		</a>
	</span>
</div>
<div>
	<p>
		
	</p>
</div>

<?php 
	if (!$_SESSION['userID']){
?>
<div class="login_form member pb20">
<form name="login" method="post" action="src/login/identify_member.php">
<fieldset>
		<legend>�α��� ��</legend>
		<ul class="login_left">
			<li>
				<input type="text" id="id" name="id" maxlength="20" value="�̸��� �ּ�" class="input_login" onblur="if (this.value.length != 0) { this.value=this.value } else { this.value = '�̸��� �ּ�'}" onfocus="this.value=''">
				
			</li>
			<li >
				<input type="password" id="password" name="password" maxlength="20" value="" class="input_login" onblur="if (this.value.length == 0) { this.className='input_login' } else { this.className='input_login focus' }" onfocus="this.className='input_login focus'">
			</li>
			<li class="btn_text">
				<a href="join.php">ȸ������</a>
				<span class="split">|</span>
				<a href="/member/id_pass_search.php"><span class="btn_id_search">ID/PW ã��</span></a>
			</li>
		</ul>
		<ul class="login_right">
			<li>
				<button class="btn_login" type="submit"/>
			</li>
	</fieldset>
</form>

</div>
<?php 
	} else { 
?>
<div class="login_form member pb20">
<form name="logout" method="post" action="src/login/logout_member.php">
	<?=$_SESSION['userName']?>���� �α��� �ϼ̽��ϴ�.
	<button class="btn_logout" type="submit"/>
</form>
</div>
<?php
	}
?>

<div class="board_list" id="board_list">
	<table cellspacing="0" cellpadding="2">
		<thead>
			<th id="board_no">
				<span>��ȣ</span>
			</th>
			<th id="board_title">
				<span>����</span>
			</th>
			<th id="board_date">
				<span>�ۼ���</span>
			</th>
		</thead>
		<tbody>
<?php 
	if (!$rows){
?>
	<tr>
		<td colspan="3" align="center">
			�Խù��� �����ϴ�.
		</td>
	</tr>

<?php 		
	} else {

		while ($row = mysql_fetch_array($postList)) {
			$no = $row[id];
			$title = $row[title];
			//$contents = mysql_result($postList, $i, 2);
			$comm_query = "SELECT * FROM comment WHERE board_id=$no";
			//echo $comm_query;
			$comm_res = mysql_query($comm_query);
			$comm_count = mysql_num_rows($comm_res);
?>
			<tr>
				<td id="board_no"><?=$no?></td>
				<td id="board_title">
					<a href="view.php?no=<?=$no?>&page=<?=$page?>"><?=$title?></a>
					&nbsp;&nbsp;
					[<?=$comm_count?>]
					&nbsp;
					<?php 
					if (substr($row[write_date], 0, 10) == date('Y-m-d')) {
					?>
					<img src="images/icon_new.gif" alt="����" title="����" class="m"/>
					<?php 
					}
					?>
				</td>
				<td id="board_date">
					<?=substr($row[write_date], 0, 10)?>
				</td>
			</tr>
<?php
					
		} 
	}
?>
		</tbody>
	</table>
</div>


<div class="board_paging">
	<div class="page_left"></div>
	<div id="paging_area">

	<?php 
		// ��������ȣ & �� ����
		$first_page = (($block - 1) * $block_set) + 1; // ù��° ��������ȣ
		$last_page = min($total_page, $block * $block_set); // ������ ��������ȣ

		$prev_page = $page - 1; // ����������
		$next_page = $page + 1; // ����������
		$prev_block = $block - 1; // ������e 
		$next_block = $block + 1; // ������
	
		// �������� ���� ���������� �Ϸ���...
		$prev_block_page = $prev_block * $block_set; // ������ ��������ȣ
		// �������� ���� ù�������� �Ϸ���...
		//$prev_block_page = $prev_block * $block_set - ($block_set - 1);
		$next_block_page = $next_block * $block_set - ($block_set - 1); // ������ ��������ȣ

		// ����¡ ȭ��
		echo ($prev_page > 0) ? "<a href='index.php?page=$prev_page'>[prev]</a> " : "[prev] ";
		echo ($prev_block > 0) ? "<a href='index.php?page=$prev_block_page'>...</a> " : "... ";

		for ($i=$first_page; $i<=$last_page; $i++) {
			echo ($i != $page) ? "<a href='index.php?page=$i'>$i</a> " : "<b>$i</b> ";
		}

		echo ($next_block <= $total_block) ? "<a href='index.php?page=$next_block_page'>...</a> " : "... ";
		echo ($next_page <= $total_page) ? "<a href='index.php?page=$next_page'>[next]</a>" : "[next]";

	?>
	</div>
	<div class="page_right">
		<span>
			<a href="write.php">�۾���</a><br><br>
		</span>
	</div>
	
</div>

<div class="board_search">

	<form name="search_form" action="search.php" method="post">
		<select name="search_type">
			<option selected value="title">����</option>
			<option value="contents">����</option>
		</select>
		<input type="text" name="keyword"/>
		<input type="submit" value="�˻�"/>
	</form>
</div>

<div class="footer">
	<span>
		Powered by KMS 2012. All right reserved.
	</span>
</div>

</body>
</html>
