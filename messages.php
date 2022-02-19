<!-- if there is a message, it will be dispalayed, otherwise it will be null  -->

<?php if ($messages = Session::instance()->get("success_message")) : ?>

    <div><?= $messages ?></div>

<?php endif; ?>

<?php if ($errors = Session::instance()->get("errors")) : ?>
    
    <?php foreach ($errors as $error) : ?>

        <div><?= $error ?></div>

    <?php endforeach; ?>

<?php endif; ?>