
<!--<div style="width: 962px; float: left; position: relative; background: #fff url(../newimages/banner/hongkong-03.jpg) no-repeat;">-->
<div id="slider2_container" style=" float:left; position:relative; margin-top:0px; width: 962px; height: 365px;">
  <!-- Slides Container -->
  <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 962px; height: 365px;">
    <div>
      <img u="image"  src="../newimages/family/slideshow/slide_show_01.jpg"  />
      <img u="thumb"  src="../newimages/family/slideshow/thumbnail_01.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/family/slideshow/slide_show_02.jpg"  />
      <img u="thumb"  src="../newimages/family/slideshow/thumbnail_02.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/family/slideshow/slide_show_03.jpg"  />
      <img u="thumb"  src="../newimages/family/slideshow/thumbnail_03.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/family/slideshow/slide_show_04.jpg"  />
      <img u="thumb"  src="../newimages/family/slideshow/thumbnail_04.gif"  />
    </div>
    <div>
      <img u="image"  src="../newimages/family/slideshow/slide_show_05.jpg"  />
      <img u="thumb"  src="../newimages/family/slideshow/thumbnail_05.gif"  />
    </div>
  </div>
  <!-- Arrow Navigator Skin Begin -->
     <style>
            /* jssor slider arrow navigator skin 05 css */
            /*
            .jssora05l              (normal)
            .jssora05r              (normal)
            .jssora05l:hover        (normal mouseover)
            .jssora05r:hover        (normal mouseover)
            .jssora05ldn            (mousedown)
            .jssora05rdn            (mousedown)
            */
            .jssora05l, .jssora05r, .jssora05ldn, .jssora05rdn
            {
              position: absolute;
              cursor: pointer;
              display: block;
                background: url(../jssor/images/a17.png) no-repeat;
                overflow:hidden;
            }
            .jssora05l { background-position: -10px -40px; }
            .jssora05r { background-position: -70px -40px; }
            .jssora05l:hover { background-position: -130px -40px; }
            .jssora05r:hover { background-position: -190px -40px; }
            .jssora05ldn { background-position: -250px -40px; }
            .jssora05rdn { background-position: -310px -40px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 130px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 130px; right: 8px">
        </span>
        <!-- Arrow Navigator Skin End -->


        <!-- ThumbnailNavigator Skin Begin -->
        <div u="thumbnavigator" class="jssort03" style="position: absolute; width: 962px; height: 80px; left:0px; bottom: 0px;">
          <div style="background-color: #000; filter:alpha(opacity=80); opacity:.8; width: 100%; height:100%;"></div>

          <!-- Thumbnail Item Skin Begin -->
          <style>
          /* jssor slider thumbnail navigator skin 03 css */
          /*
          .jssort03 .p            (normal)
          .jssort03 .p:hover      (normal mouseover)
          .jssort03 .pav          (active)
          .jssort03 .pav:hover    (active mouseover)
          .jssort03 .pdn          (mousedown)
          */
          .jssort03 .w, .jssort03 .pav:hover .w
          {
            position: absolute;
            width: 103px;
            height: 50px;
            border: white 3px solid;
          }
          * html .jssort03 .w
          {
            width: 103px;
            height: 50px;
          }
          .jssort03 .pdn .w, .jssort03 .pav .w { border-style: solid; }
          .jssort03 .c
          {
            width: 108px;
            height: 55px;
            filter:  alpha(opacity=45);
            opacity: .45;
            
            transition: opacity .6s;
            -moz-transition: opacity .6s;
            -webkit-transition: opacity .6s;
            -o-transition: opacity .6s;
          }
          .jssort03 .p:hover .c, .jssort03 .pav .c
          {
            filter:  alpha(opacity=0);
            opacity: 0;
          }
          .jssort03 .p:hover .c
          {
            transition: none;
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
          }
          </style>
          <div u="slides" style="cursor: move;left: 21px;">
            <div u="prototype" class="p" style="POSITION: absolute; WIDTH: 108px; HEIGHT: 55px; TOP: 0; LEFT: 0;">
              <div class=w><ThumbnailTemplate style=" WIDTH: 100%; HEIGHT: 100%; border: none;position:absolute; TOP: 0; LEFT: 0;"></ThumbnailTemplate></div>
              <div class=c style="POSITION: absolute; BACKGROUND-COLOR: #000; TOP: 0; LEFT: 0"></div>
            </div>
          </div>
          <!-- Thumbnail Item Skin End -->
      </div>
      <!-- ThumbnailNavigator Skin End -->
  </div>