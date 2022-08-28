<?php

use app\actions\AdminActions;

include "app/header.php";
$fieldsSignIn = AdminActions::getFields();
?>

<div>
    <div class="h3 text-center pt-3">
        Авторизация
    </div>
    <div class="text-center row w-25 mx-auto">
        <form action="/admin/signIn" method="post">
            <?php
            foreach ($fieldsSignIn as $field => $value)
            {
                if($field == "password")
                    echo "<input type='password' name='$field' placeholder='$field' value=\"$_POST[$field]\" class='col-12 mt-4 p-2'>";
                else
                    echo "<input type='$value' name='$field' placeholder='$field' value=\"$_POST[$field]\" class='col-12 mt-4 p-2'>";
            }
            ?>
            <button class="btn btn-primary mt-5" name="signIn">
                Авторизоваться
            </button>
        </form>
        <div class="text-danger">
            <?= AdminActions::signIn(); ?>
        </div>
    </div>
</div>

</body>
</html>