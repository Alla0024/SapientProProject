<?php
if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password1 = isset($_POST['password1']) ? $_POST['password1'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';

        if (!$password1) {
     echo "Оберіть поля!";
        }else{
          Information::addRegistration($name, $username, $password1, $password2,  $email, $phone, $country);
           header('Location: index_admin.php?action=success');
       } 
        
}


?>



<div class="registcontainer">
    <form action="" method="POST">

        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="name" value="1" aria-label="name">Ім'я
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"name="username" value="1" aria-label="username">Логін
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="password1" value="1" aria-label="password1">Пароль
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="password2" value="1" aria-label="password2">Повторний пароль
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="email" value="1" aria-label="email">Електронна пошта
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="phone" value="1" aria-label="phone">Номер телефону
        </div>
        <div class="form-check">
            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" name="country" value="1" aria-label="country">Країна
        </div>


        <input class="dws-submit" type="submit" name="submit" value="Зберегти">

    </form>
</div>