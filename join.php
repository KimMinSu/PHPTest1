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
		<span class="join_title">ȸ������ ���</span>
		<div class="agree_box">
			<?php 
				provisionData();
			?>
		</div>
		<p class="pb20">
			<input type="checkbox" name="chk1"/> 
			<span class="agree_ment">���� "ȸ������ ���"�� �����մϴ�.</span>
		</p>
	</p>
	
	<p>	
		<span class="join_title">�������� ��޹�ħ</span>
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
			<span class="agree_ment">���� "�������� �����̿�"�� �����մϴ�.</span>
		</p>
	</p>
	<p>
		<div class="c pb20">ȸ����� �� ����������޹�ħ�� ���� �� �Ǹ������� �ϼž� �����Ͻ� �� �ֽ��ϴ�.</div>
		
		<div class="c pb20">
			<form action="join_input.php" method="post">
			<span class="button btn_color6 mr10" id="gostart">
				<button type="submit">��</button>
			</span>
			
			<span class="button btn_color7">
				<a href="javascript:history.back();">�ƴϿ�</a>
			</span>
			</form>
		</div>
	</p>
	
	<p>
	
	</p>
	


</div>

</body>

