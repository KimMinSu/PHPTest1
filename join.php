<?php

	include 'src/member/provision_data.php';
	include 'src/member/private_info_rule_data.php';

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
	<p class="join_navi_img">
		<img src="images/join_step1.gif"/>
	</p>	
	<p>
		<span class="join_title">회원가입 약관</span>
		<div class="agree_box">
			<?php 
				provisionData();
			?>
		</div>
		<p class="pb20">
			<input type="checkbox" name="chk1"/> 
			<span class="agree_ment">위의 "회원가입 약관"에 동의합니다.</span>
		</p>
	</p>
	
	<p>	
		<span class="join_title">개인정보 취급방침</span>
		<div class="agree_box">
			<?php 
				privateInfoData1();
			?>
		</div>
		<div class="agree_box">
			<?php 
				privateInfoData2();
			?>
		</div>
		<div class="agree_box">
			<?php 
				privateInfoData3();
			?>
		</div>
		<p class="pb20">
			<input type="checkbox" name="chk2"/> 
			<span class="agree_ment">위의 "개인정보 수집이용"에 동의합니다.</span>
		</p>
	</p>
	<p>
		<div class="c pb20">회원약관 및 개인정보취급방침에 동의 및 실명인증을 하셔야 가입하실 수 있습니다.</div>
		
		<div class="c pb20">
			<form action="join_input.php" method="post">
			<span class="button btn_color6 mr10" id="gostart">
				<button type="submit">예</button>
			</span>
			
			<span class="button btn_color7">
				<a href="javascript:history.back();">아니오</a>
			</span>
			</form>
		</div>
	</p>
	
	<p>
	
	</p>
	


</div>

</body>

