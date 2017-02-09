<?php

$filename ='contact';

$title = 'Contact Us';


require_once __DIR__ . '/head.php';
require_once __DIR__ . '/nav.php';

?>


<div style="text-align: justify">
    <h1>Contact Us</h1>

    <h3>Just fill in the form</h3>

    <form >
        <label for="name">Name:</label>
        <br>
        <input type="text" size="20" id="name">

        <br>
        <br>

        <label for="tel">Contact number:</label>
        <br>

        <input type="tel" size="20" id="tel">

        <br>
        <br>

        <label for="email">Email:</label>
        <br>

        <input type="email" size="20" id="email">

        <br>
        <br>

        <label for="text">Concern:</label>
        <br>

        <input type="text"  id="text">
        <br>
        <br>
        <br>


        <button type="submit">Submit</button>

    </form>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
