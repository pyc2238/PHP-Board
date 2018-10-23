<!-- 회원 아이디 중복체크여부 윈도우창 -->

<link rel="stylesheet" href="./member.css">


<?php
	require_once("C:/xampp/htdocs/TermProject/tools.php");
	require_once("C:/xampp/htdocs/TermProject/member/MemberDao.php");
	
	$uid = requestValue("userid");

	//HTML 태그 방지 소스
	$uid = str_replace("<", "&lt", $uid);
	$uid = str_replace(">", "&gt", $uid);
	$uid = str_replace("  ","&nbsp;&nbsp;",$uid);
    $dao = new MemberDao();
	$member = $dao->getMember($uid);
	

	if($member==0):?>
		<div id="notice" style='font-family:"malgun gothic"';><?php echo $uid; ?>은 사용가능한 아이디입니다.</div>
		<div id="closeBtn"><button value="닫기" onclick="window.close()">닫기</button></div>
		<?php else :?>
		<div id="notice" style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>은 중복된아이디입니다.<div>
		<div id="closeBtn"><button value="닫기" onclick="window.close()">닫기</button></div>
	<?php endif ?>
	






