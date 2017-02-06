<?php
$filename ='post';

$title = 'Post';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';


?>


<body>

<div class="container">


    <div class="jumbotron">
        <header style="text-align: right">
            <h2>Post heading</h2>

            <div>
                <p>User that created the post</p>
            </div>
        </header>
    </div>
    <div class="row">
        <aside>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>
            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

            <hr>

            <h3>User123</h3>
            <p>This is on the side panel</p>
            <p>25/12/2016</p>

        </aside>
        <div id="cntrol">

        </div>
        </div>
    </div>

</body>
<?php require_once __DIR__ . '/footer.php'; ?>


