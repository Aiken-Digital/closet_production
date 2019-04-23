<?php

    /*
    *   Template Name: Designers Page
    */
    get_header();
?>

<div id="fixx-designers-page">
    <div class="designers-selector-bar">
        <div class="container">
            <ul class="designers-index">
                <li><a href="#123">#</a></li>
                <li><a href="#A">A</a></li>
                <li><a href="#B">B</a></li>
                <li><a href="#C">C</a></li>
                <li><a href="#D">D</a></li>
                <li><a href="#E">E</a></li>
                <li><a href="#F">F</a></li>
                <li><a href="#G">G</a></li>
                <li><a href="#H">H</a></li>
                <li><a href="#I">I</a></li>
                <li><a href="#J">J</a></li>
                <li><a href="#K">K</a></li>
                <li><a href="#L">L</a></li>
                <li><a href="#M">M</a></li>
                <li><a href="#N">N</a></li>
                <li><a href="#O">O</a></li>
                <li><a href="#P">P</a></li>
                <li><a href="#Q">Q</a></li>
                <li><a href="#R">R</a></li>
                <li><a href="#S">S</a></li>
                <li><a href="#T">T</a></li>
                <li><a href="#U">U</a></li>
                <li><a href="#V">V</a></li>
                <li><a href="#W">W</a></li>
                <li><a href="#U">U</a></li>
                <li><a href="#X">X</a></li>
                <li><a href="#Y">Y</a></li>
                <li><a href="#Z">Z</a></li>
            </ul>
        </div>
    </div>
    <div class="designers-listing">
        <div class="container">
            <div class="designers-columns">
                <?php foreach (get_all_brand() as $key => $value): ?>
                    <div class="designers-section" id="<?php echo $key;?>">
                        <div class="title"><?php echo $key;?></div>
                        <ul>
                            <?php foreach ($value as $kit => $val): ?>
                                <li><a href="/closet/designer/<?php echo $val;?>"><?php echo ucwords(str_replace('-', ' ', $val));?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>