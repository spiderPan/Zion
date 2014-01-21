<?php get_header(); ?>
    <section class="container">
        <h2 class="hid">Body</h2>

        <div class="row">
            <div class="twocol">
                <?php
                echo "<ul>";
                if ($handle = opendir("platform/")) {
                    //echo "handle is".$handle;
                    while (false !== ($entry = readdir($handle))) {
                        if ($entry != "." && $entry != "..") {
                            echo "<li class=\"cen\"><a class=\"product_item\" href=\"platform/" . $entry . "/\" target=\"_blank\">" . $entry . "</a></li>";
                        }
                    }

                }
                echo "</ul>";
                ?>
            </div>

            <div class="eightcol">
                <h3 class="hid">Player</h3>

                <video id="myPlayer" class="video-js vjs-default-skin" poster="images/v5.jpg" controls
                       autoplay="autoplay" width="636" height="358">
                    <source src="video/movie5.mp4" type="video/mp4">
                    <source src="video/movie5.webm" type="video/webm">
                    <source src="video/movie5.ogg" type="video/ogg">
                    <object width="636" height="358">
                        <param name="video" value="http://fpdownload.adobe.com/strobe/FlashMediaPlayback.swf">
                        <param name="flashvars" value="src=http://panbanglanfeng.dyndns.org/video/movie5.mp4">
                        <param name="allowFullScreen" value="true">
                        <param name="allowscriptaccess" value="always">
                        <embed src="http://fpdownload.adobe.com/strobe/FlashMediaPlayback.swf"
                               type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"
                               width="100%" height="100%"
                               flashvars="src=http://panbanglanfeng.dyndns.org/video/movie5.mp4">
                    </object>
                </video>
                <h3 class="cen videoInfo">Demo Reel</h3>
            </div>

            <div class="twocol last">

            </div>

        </div>

        <div id="list" class="row">
            <h3 class="hid">Select Video Source</h3>

            <div class="twocol">

            </div>

            <div onMouseOver="vidLabel(this);" class="twocol lab">
                <a href="#myPlayer" onclick="switchVideo(this)">
                    <img src="images/v1.jpg" alt="Video1">
                </a>

                <div class="La hid">
                    <p class="cen">Video1</p>
                </div>
            </div>

            <div onMouseOver="vidLabel(this);" class="twocol lab">
                <a href="#myPlayer" onclick="switchVideo(this)">
                    <img src="images/v2.jpg" alt="Video2">
                </a>

                <div class="La hid">
                    <p class="cen">Video2</p>
                </div>
            </div>

            <div onMouseOver="vidLabel(this);" class="twocol lab ">
                <a href="#myPlayer" onclick="switchVideo(this)">
                    <img class="viPanel" src="images/v3.jpg" alt="Video3">
                </a>

                <div class="La hid">
                    <p class="cen">Video3</p>
                </div>
            </div>

            <div onMouseOver="vidLabel(this);" class="twocol lab">
                <a href="#myPlayer" onclick="switchVideo(this)">
                    <img class="viPanel" src="images/v4.jpg" alt="Video4">
                </a>

                <div class="La hid">
                    <p class="cen">Video4</p>
                </div>
            </div>

            <div class="twocol last">
            </div>

        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="twocol">

            </div>

            <div class="eightcol">
                <img src="images/imgBottom.png" width="746" height="315" alt="pan">
            </div>

            <div class="twocol last">

            </div>

        </div>
    </div>
<?php get_footer(); ?>