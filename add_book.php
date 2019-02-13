<?php
session_start();
require 'Conf/xycms.inc.php';
require XYCMSPATH.'Libs/Function/fun.php';
$yzcode=md5($yzcode);
?>
<?php require 'header.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>在线留言_<?php echo $wzname;?>_<?php echo $wzversion;?></title>
<link href="Style/index.css" type="text/css" rel="stylesheet" />
<script src="Statics/Js/jquery-1.8.3.min.js" language="javascript"></script>
<script src="Statics/Js/xycms.js" language="javascript"></script>
</head>
<body>
<div id="contain">
  <?php require 'top.php';?>
  <div id="box">
    <div class="b_l">
      <div class="b_l_c">
        <ul>
          <Li><a href="index.php">查看留言</a></Li>
          <Li class="hover"><a href="add_book.php">添加留言</a></Li>
        </ul>
      </div>
    </div>
    <div class="b_r">
      <div class="b_r_c">
        <div class="add_book">
          <div class="add_form">
            <div class="title">在线留言</div>
            <div class="form">
              <form action="add_do.php" method="post" name="b_form" id="p_form">
              <input name="b_yzcode" type="hidden" value="<?php echo $yzcode;?>" />
              <input name="b_ip" type="hidden" value="<?php echo getIp();?>" />
              <table width="100%">
                <tr>
                  <td width="9%"><span>留言分类：</span></td>
                  <td width="91%">
                    <select name="type_id" id="type_id" class="b_select">
                      <?php echo book_classlist();?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td><span>留言标题：</span></td>
                  <td><input name="b_title" class="b_input" size="40" id="b_title" /> <font color="#FF0000"><i id="b_sm_t"></i> *</font></td>
                </tr>
                <tr>
                  <td><span>留言内容：</span></td>
                  <td><textarea name="b_content" rows="7" cols="50" id="b_content" class="b_textarea"></textarea> <font color="#FF0000">*</font></td>
                </tr>
                <tr>
                  <td><span>姓 名：</span></td>
                  <td><input name="b_name" class="b_input" size="40" id="b_name" /> <font color="#FF0000"><i id="b_n_t"></i> *</font></td>
                </tr>
                <tr>
                  <td><span>联系电话：</span></td>
                  <td><input name="b_tel" class="b_input" size="40" /> </td>
                </tr>
                <tr>
                  <td><span>联系邮箱：</span></td>
                  <td><input name="b_mail" class="b_input" size="40" /> </td>
                </tr>
                <tr>
                  <td><span>联系QQ：</span></td>
                  <td><input name="b_qq" class="b_input" size="40" /> </td>
                </tr>
                <tr>
                  <td><span>验证码：</span></td>
                  <td><input name="checkcode" class="b_input" size="8" onclick="xycms_loadcode()"/> <span id="checkCode"></span><span id="tip">点击显示验证码</span></td>
                </tr>
                <tr>
                  <td colspan="2" valign="middle" style="padding-left:78px;"><input type="submit" value="在线提交" class="b_submit" /></td>
                </tr>
                
              </table>
              </form>
            </div>
            <div class="ms">
              <h3>留言须知：</h3>
              <p>1、严禁对个人、实体、民族、国家等进行漫骂、污蔑与诽谤</p>
              <p>2、网友应遵守我国互联网的相关法规</p>
              <p>3、网友应对所发布的信息承担全部责任</p>
              <p>4、网站管理人员有权保留或删除留言中的信息内容</p>
              <p>5、发表留言即表明已阅读并接受以上条款</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cl"></div>
  </div>
  
</div>
</body>
</html>


<?php require 'foot.php';?>