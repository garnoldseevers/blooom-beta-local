<div class="ats-employer-panel-body-wrapper entry">
    <?php
    if ($employer->panel_text) {
        echo do_shortcode($employer->panel_text);
    } else {
        _e('Try to add some panel text for this employee ;)', LA_Team_Builder::$plugin['name']);
    }
    ?>
</div>