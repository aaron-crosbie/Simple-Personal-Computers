<?php
/**
 * Created by PhpStorm.
 * User: gelmi
 * Date: 19/08/2016
 * Time: 19:08
 */

$filename ='survey';

$title = 'Survey';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';


?>
<!--<p style="text-align: center"><i>Help is given whenever you seek for it</i></p>-->

<div style="background-color: #313131; color: azure; padding: 10%;">
<h1>Survey</h1>

<?php require_once __DIR__ . '/survey.php'; ?>
</div>


<?php require_once __DIR__ . '/footer.php'; ?>

