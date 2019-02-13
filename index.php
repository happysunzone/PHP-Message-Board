<?php
if(!file_exists(dirname(__FILE__).'/Conf/install.lock')){
  header('Location:install/index.php');
  exit();
}
require 'Conf/xycms.inc.php';
require XYCMSPATH.'Libs/Class/page.class.php';
require XYCMSPATH.'Libs/Function/fun.php';
$b_id=intval(trim($_GET['id']));
if($b_id==0||$b_id==''){
	$sqltype='';
}else{
	$sqltype="and type_id=$b_id";
}
?>
<?php require 'header.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $wzname;?>_<?php echo $wzversion;?></title>
<link href="Style/index.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="contain">
  <?php require 'top.php';?>
  <div id="box">
    <div class="b_l">
      <div class="b_l_c">
        <ul>
          <Li class="hover"><a href="index.php">查看留言</a></Li>
          <Li><a href="add_book.php">添加留言</a></Li>
        </ul>
      </div>
    </div>
    <div class="b_r">
      <div class="b_r_c">
        <?php
        $sql="select id from xycms_book where is_view=1 $sqltype order by id desc";
		$ids=$db->get_all($sql,MYSQL_ASSOC);
		if($ids){
		  foreach($ids as $k){
			$xyids.=$k['id'].',';  
		  }
		}
		$xyids=substr($xyids,0,strlen($xyids)-1);
		$total=count($ids);
		$page=new page_link($total,$view_nums);
		$sql="select id,b_name,type_id,b_title,b_content,c_date from xycms_book where id in($xyids) and is_view=1 $sqltype order by id desc limit $page->firstcount,$page->displaypg";
		$result=$db->get_all($sql,MYSQL_ASSOC);
		if($result){
			foreach($result as $nums=>$val){
		?>
        <div class="book">
          <div class="text">
            <div class="div">
              <div class="icon"></div>
              <div class="base"><span>#<?php echo ($nums+1);?></span><i class="s_m"></i><?php echo $val['b_name'];?></div>
              <div class="content">[<?php echo getclassname($val['type_id'],'xycms_book_class','index.php');?>] <?php echo $val['b_title'];?> <span> (<?php echo date('Y-m-d',$val['c_date']);?>)</span></div>
              <div class="ask"><?php echo $val['b_content'];?></div>
              <?php echo reply_content($val['id'],'xycms_book_reply');?>
            </div>
          </div>
        </div>
        <?php
			}
		}else{
		?>
        <div class="book">
          <div class="text">
            <div class="div">
              <div class="icon"></div>
              <div class="base">暂无留言！</div>
              <div class="content"></div>
              <div class="reply"></div>
            </div>
          </div>
        </div>
        <?php
		}
		?>
        <div class="pagination">
        <?php
		echo $page->show_link();
		?>
        </div>
      </div>
    </div>
    <div class="cl"></div>
  </div>
  
</div>

</body>
</html>


<?php require 'foot.php';?>


