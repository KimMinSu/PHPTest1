<?php

?>

<head>
	<link rel="stylesheet" href="css/style.css"/>
	
</head>

<body>

<div class="title pb20">
	<span class="title_text">
		<a href="index.php?page=1">
		TEST JOIN V.1
		</a>
	</span>
</div>

<div>
	<p class="join_navi_img pb20">
		<img src="images/join_step2.gif"/>
	</p>
</div>

<form name="member_info" method="post" action="src/member/enroll_member.php" autocomplete="off">
	<div id="join_input_area">
		<table class="write_table">
			<colgroup>
				<col width="150" />
				<col width="*" />
			</colgroup>	
			<tbody>
					<tr> 
						<th class="req">이메일 주소</th>
						<td>
							<input name="email" value="" class="input_txt" size="20" maxLength="15"/>
							<span>메일 수신이 가능한 이메일 주소만 가능</span>
						</td>
					</tr>
					<tr> 
						<th class="req">패스워드</th>
						<td>
							<input type="password" name="password" class="input_txt" size="20" maxlength="12" />
							<span>6~12자 이내, 영문 숫자 혼용 사용</span>
						</td>
					</tr>
					<tr> 
						<th class="req">패스워드 확인</th>
						<td>
							<input type="password" name="password_re" class="input_txt" size="20" maxlength="12" />
							<span>비밀번호를 재입력</span>
						</td>
					</tr>
					<tr> 
						<th class="req">이름</th>
						<td>
							<input type="text" name="name" class="input_txt" size="20" maxlength="12" />
						</td>
					</tr>
					<tr> 
						<th class="req">성별</th>
						<td>
							<select name="sex" class="input_sel">
								<option value=''>선택하세요
								<option value='female' >여자
								<option value='male' selected>남자
							</select>
						</td>
					</tr>
					<tr> 
						<th>핸드폰번호</th>
						<td>
							<input class="input_txt" type="text" name="cellphone" size="21" maxlength="20" />
						</td>
					</tr>	
			</tbody>
		</table>
		<p class="pb20"/>

		<p class="pb20">
			<span class="button btn_color6">
				<input type="submit" name="submit" value="회원가입">
				<!--  <button name="submit" type="button" onclick="btn_submit();">회원가입</button> -->
			</span>
		</p>
	</div>
</form>

<script type="text/javascript">

function btn_submit(){
	f = document.getElementsByName("member_info");
	f.setAttribute("method","post");
	f.setAttribute("action","src/memeber/enroll_member.php");
	f.submit();
}

</script>

</body>