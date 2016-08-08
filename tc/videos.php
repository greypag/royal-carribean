<?php include 'pageHead.php'; ?>
<script>
    $(document).ready(function() {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('#ocean').attr('target', '_self');
            $('#ocean').attr('rel', '');
            $('#ocean').attr('href', 'deck-plan-image.php?type=ocean');
        }
    });
</script>

<link href="../css/about.css" rel="stylesheet" type="text/css" />
<link href="../css/person.css" rel="stylesheet" type="text/css" />
<link href="../css/deck.css" rel="stylesheet" type="text/css" />

<body style="background: url(../newimages/bodyBG.jpg) top center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;">

    <div style='height:92px; width:962px; margin:auto; position:relative' >
        <?php include 'pageMenu.php'; ?>

        <div style="width: 920px; position: absolute; color: #444; line-height: 35px; left: 8px; top: 71px;"><a href="index.php">首頁</a> &gt; 皇家遊輪船隊 &gt; <a href="voyager.php">海洋航行者號</a>
        </div>
    </div>

    <div class="page_contentbox" style='width:962px'>
        <div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/voyager.jpg) no-repeat;">

            <div style="width: 962px;float: left;margin: 250px 0 0 0;background: 10px 168px no-repeat;">
                <div class="page_left">
                    <div class="page_left01" style="height:auto; background-repeat:no-repeat; margin:0px auto auto 15px;">

                        <?php include( 'ship_tabs.php' ) ?>

                        <div style="position:relative; float:left; width:640px; left:30px;min-height:550px;">

                            <p>&nbsp;</p>

                            <iframe width="620" height="349" src="//www.youtube.com/embed/zJS0we6aJJg?rel=0" frameborder="0" allowfullscreen></iframe>

                            <p>&nbsp;</p>

                        </div>


                    </div>
                </div>
                <?php include 'pageRight.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'pageFoot.php'; ?>

