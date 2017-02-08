<?php

?>
    <nav>

        <ul>
            <li><a
                    <?php
                    if($filename == 'index') {
                        ?>
                        id="current"
                        <?php
                    }
                    ?> href="index.php"><span>Home</span></a></li>
            <li><a
                    <?php
                    if($filename == 'build') {
                    ?>
                    id="current"
                    <?php
                    }
                    ?> href="build.php"><span>Build SPC</span></a></li>

            <li>
                <a
                <?php
                    if($filename == 'blog') {
                    ?>
                    id="current"
                    <?php
                    }
                    ?> href="blog.php"><span >Blog</span></a></li>

            <li><a
                    <?php
                    if($filename == 'survey') {
                    ?>
                    id="current"
                    <?php
                    }
                    ?> href="surveyAsk.php"><span>Survey</span></a></li>

        <li><a
                    <?php
                    if($filename == 'contact') {
                    ?>
                    id="current"
                    <?php
                    }
                    ?>href="contact.php">Contact Us</a></li>
        </ul>

    </nav>

