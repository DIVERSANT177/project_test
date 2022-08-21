<?php
include "app/header.php";
$fieldsSignUp = AdminActions::getFields();
?>

<div>
    <div class="h3 text-center pt-3">
        Регистрация нового пользователя
    </div>
    <div class="text-center row w-25 mx-auto">
        <form action="/admin/signUp" method="post">
            <?php
            foreach ($fieldsSignUp as $field => $value)
            {
                if($field == "password")
                    echo "<input type='password' name='$field' placeholder='$field' value=\"$_POST[$field]\" class='col-12 mt-4 p-2'>";
                else
                    echo "<input type='$value' name='$field' placeholder='$field' value=\"$_POST[$field]\" class='col-12 mt-4 p-2'>";
            }
            ?>
            <button class="btn btn-primary mt-5" name="signUp">
                Зарегистрироваться
            </button>
        </form>
        <div class="text-danger">
            <?= AdminActions::signUp(); ?>
        </div>
    </div>
</div>

</body>
</html>

<?php


