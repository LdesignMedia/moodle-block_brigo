<?php
/**
 * File: room.php
 * Encoding: UTF-8
 * @package: MOODLE PLUGINS
 * @subpackage brigo
 * @copyright  Luuk Verhoeven [MoodleFreak.com]
 * */
?>
<div id="brigoRoom">
    <div id="brigoRoomHolder">
        <div class="space">
            <h4><?php echo get_string('messages', Brigo_Config::NAME) ?></h4>
            <div id="brigoMessages" class="brigoScroll">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview">
                        <!-- chat -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <input id="addBrigoMessage" placeholder="<?php echo get_string('typehere', Brigo_Config::NAME) ?>" type="text" maxlength="400" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="brigoSend">Send</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div>
    </div>
    <div id="brigoUserHolder">
        <div class="space">
            <h4 class="text-center"><?php echo get_string('online_clients', Brigo_Config::NAME) ?></h4>
            <div id="brigoOnlineUsers" class="brigoScroll">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview">
                        <!-- users -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>