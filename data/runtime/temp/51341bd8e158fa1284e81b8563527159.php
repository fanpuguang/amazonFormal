<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/plug/shouquan.html";i:1578553888;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Amazon亚马逊店铺授权方法</title>
    <meta name="robots" content="noindex, nofollow">
    
    <link href="/shouquantupian/bootstrap.min.css" rel="stylesheet">
 
    <style type="text/css">
        body{padding:20px;}
        .img{padding:10px 0;}
        .red{color:#E53333;}
    </style>
</head>
<body>
<div style="max-width: 1200px;margin: 0 auto">
    <h1 style="color: #34a5ee;font-size: 22px">Amazon亚马逊店铺授权方法</h1>
    <h5>填写授权信息提交授权</h5>
    <p>点击【添加Amazon授权】，按要求完成相关授权信息添加，并【添加授权】即可完成该店铺的授权。</p>
    <div class="img">
        <img src="/shouquantupian/ruhe.png" class="img-thumbnail">
    </div>
    <p>如图：完成授权我们需要五个信息</p>
    <p>店铺别名：根据自己的实际情况而定，可以是英文可以是汉字</p>
    <p>Amazon账号：这项填写您的亚马逊后台登录账号（一般为邮箱）</p>
    <p>开户区域根据您要开户的区域选择即可</p>

    <p style="color: #34a5ee;margin-top: 20px;">Merchant ID（卖家编号）和授权令牌则需要在亚马逊后台获取。以下分别阐述这两个数据如何获取</p>
    <h2 style="color: #34a5ee;font-size: 19px">一、获取Merchant ID（卖家编号）</h2>
    <h5>此示例为欧洲站的授权</h5>
    <p>1.首先登录亚马逊后台</p>
    <div class="img">
        <img src="/shouquantupian/ruhe1.png" class="img-thumbnail">
    </div>
    <p>2.按图所示，先确认登录的账号为要授权地区国家的账号;然后点击设置——账户信息。跳转到下图</p>
    <div class="img">
        <img src="/shouquantupian/ruhe2.png" class="img-thumbnail">
    </div>
    <p>3.找到“您的卖家记号”，点击进入</p>
    <div class="img">
        <img src="/shouquantupian/ruhe3.png" class="img-thumbnail">
    </div>
    <p>4.如图所示，可以看到您的卖家标志，这串编号就是我们系统中授权时所需要的Merchant ID</p>

    <h2 style="color: #34a5ee;font-size: 19px">二、获取授权令牌</h2>
    <h5>此示例为欧洲站的授权</h5>
    <p>1.首先登录亚马逊后台</p>
    <div class="img">
        <img src="/shouquantupian/ruhe4.png" class="img-thumbnail">
    </div>
    <p>2.按图所示，先确认登录的账号为要授权地区国家的账号；然后点击设置——用户权限。跳转到下图</p>
    <div class="img">
        <img src="/shouquantupian/ruhe5.png" class="img-thumbnail">
    </div>
    <p>3.找到图中框中的“第三方开发人员和应用程序”，点击访问进入。可以看到下图</p>
    <div class="img">
        <img src="/shouquantupian/ruhe6.png" class="img-thumbnail">
    </div>
    <p>4.首先查看是否已经有我们需要的授权信息。<br>
        欧洲站开发者ID：337746946485  开发者名称：LIUJIELD<br>
        北美站开发者ID：245406220147  开发者名称：LDKJMY<br>
        日本站开发者ID：176134752944  开发者名称：LJLD<br>
        如果已有我们的授权信息，请直接跳过5查看第7点。</p>
    <p>5.点击授权新的开发者进行授权，如下图所示</p>
    <div class="img">
        <img src="/shouquantupian/ruhe7.png" class="img-thumbnail">
    </div>
    <p>6.开发者ID填写对应站点的开发者ID，在第4点有说明。填写完成后点击下一页按指示向导完成第三方授权，然后回到我们的“第三方开发人员和应用程序”页面，如下图所示</p>
    <div class="img">
        <img src="/shouquantupian/ruhe8.png" class="img-thumbnail">
    </div>
    <p>7.在列表中找到我们的授权数据，点击“View”查看授权令牌，如下图所示</p>
    <div class="img">
        <img src="/shouquantupian/ruhe9.png" class="img-thumbnail">
    </div>
    <p>8.图中模糊部分为我们系统授权所需要的授权授权令牌。</p>
    <p style="color: #34a5ee">到这里，授权所需的信息就都有了，可以正确的进行授权</p>



</div>

</body></html>