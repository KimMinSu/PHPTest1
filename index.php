
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
	
	$page_set = 11;  // 한 페이지당 10개의 글
	$block_set = 5;  // 최대 5개의 페이징
	
	
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
	
	$block = ceil($page/$block_set);  // 올림함수 ceil
	$limit_idx = ($page - 1) * $page_set; //1페이지는 0, 2페에지는 5
	//echo "sdgsdg $limit_idx   ";
	
	// 각 페이지에 대한 쿼리문
	$query = "SELECT * FROM board ORDER BY id DESC LIMIT $limit_idx, $page_set";  //최신 글 부터 상위에 나오게 하기위해 ORDER BY id DESC
	//echo "<br>$query";
	$postList = mysql_query($query) or die(mysql_error());  // 쿼리 수행
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
		<legend>로그인 폼</legend>
		<ul class="login_left">
			<li>
				<input type="text" id="id" name="id" maxlength="20" value="이메일 주소" class="input_login" onblur="if (this.value.length != 0) { this.value=this.value } else { this.value = '이메일 주소'}" onfocus="this.value=''">
				
			</li>
			<li >
				<input type="password" id="password" name="password" maxlength="20" value="" class="input_login" onblur="if (this.value.length == 0) { this.className='input_login' } else { this.className='input_login focus' }" onfocus="this.className='input_login focus'">
			</li>
			<li class="btn_text">
				<a href="join.php">회원가입</a>
				<span class="split">|</span>
				<a href="/member/id_pass_search.php"><span class="btn_id_search">ID/PW 찾기</span></a>
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
	<?=$_SESSION['userName']?>님이 로그인 하셨습니다.
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
				<span>번호</span>
			</th>
			<th id="board_title">
				<span>제목</span>
			</th>
			<th id="board_date">
				<span>작성일</span>
			</th>
		</thead>
		<tbody>
<?php 
	if (!$rows){
?>
	<tr>
		<td colspan="3" align="center">
			게시물이 없습니다.
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
					<img src="images/icon_new.gif" alt="새글" title="새글" class="m"/>
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
		// 페이지번호 & 블럭 설정
		$first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
		$last_page = min($total_page, $block * $block_set); // 마지막 페이지번호

		$prev_page = $page - 1; // 이전페이지
		$next_page = $page + 1; // 다음페이지
		$prev_block = $block - 1; // 이전블럭e 
		$next_block = $block + 1; // 다음블럭
	
		// 이전블럭을 블럭의 마지막으로 하려면...
		$prev_block_page = $prev_block * $block_set; // 이전블럭 페이지번호
		// 이전블럭을 블럭의 첫페이지로 하려면...
		//$prev_block_page = $prev_block * $block_set - ($block_set - 1);
		$next_block_page = $next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호

		// 페이징 화면
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
			<a href="write.php">글쓰기</a><br><br>
		</span>
	</div>
	
</div>

<div class="board_search">

	<form name="search_form" action="search.php" method="post">
		<select name="search_type">
			<option selected value="title">제목</option>
			<option value="contents">내용</option>
		</select>
		<input type="text" name="keyword"/>
		<input type="submit" value="검색"/>
	</form>
</div>

<div class="footer">
	<span>
		Powered by KMS 2012. All right reserved.
	</span>
</div>

</body>
</html>
