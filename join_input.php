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
						<th class="req">�̸��� �ּ�</th>
						<td>
							<input name="email" value="" class="input_txt" size="20" maxLength="15"/>
							<span>���� ������ ������ �̸��� �ּҸ� ����</span>
						</td>
					</tr>
					<tr> 
						<th class="req">�н�����</th>
						<td>
							<input type="password" name="password" class="input_txt" size="20" maxlength="12" />
							<span>6~12�� �̳�, ���� ���� ȥ�� ���</span>
						</td>
					</tr>
					<tr> 
						<th class="req">�н����� Ȯ��</th>
						<td>
							<input type="password" name="password_re" class="input_txt" size="20" maxlength="12" />
							<span>��й�ȣ�� ���Է�</span>
						</td>
					</tr>
					<tr> 
						<th class="req">�̸�</th>
						<td>
							<input type="text" name="name" class="input_txt" size="20" maxlength="12" />
						</td>
					</tr>
					<tr> 
						<th class="req">����</th>
						<td>
							<select name="sex" class="input_sel">
								<option value=''>�����ϼ���
								<option value='female' >����
								<option value='male' selected>����
							</select>
						</td>
					</tr>
					<tr> 
						<th>�ڵ�����ȣ</th>
						<td>
							<input class="input_txt" type="text" name="cellphone" size="21" maxlength="20" />
						</td>
					</tr>	
			</tbody>
		</table>
		<p class="pb20"/>

		<p class="pb20">
			<span class="button btn_color6">
				<input type="submit" name="submit" value="ȸ������">
				<!--  <button name="submit" type="button" onclick="btn_submit();">ȸ������</button> -->
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