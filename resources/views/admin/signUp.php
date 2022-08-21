<?php
include "app/header.php";
$signUp = new SignUp();
$fieldsSignUp = $signUp->getFields();
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
                echo "<input type='$value' name='$field' placeholder='$field' class='col-12 mt-4 p-2'>";
            }
            ?>
            <button class="btn btn-primary mt-5">
                Зарегистрироваться
            </button>
        </form>
    </div>

</div>

</body>
</html>

<?php

