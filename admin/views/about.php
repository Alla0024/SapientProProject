<?php
if (isset($_POST['submit'])) {
    $schooldescription = isset($_POST['schooldescription']) ? $_POST['schooldescription'] : '';

    if (!$schooldescription) {
        echo "Поле не заповнене!";
    }else{
        Information::addSchoolDescription($schooldescription);
        header('Location: index_admin.php?action=success');
    } 
}

  ?>
  
<div class="about">
    <div class="aboutcontainer">
        <div class="aboutpreg">
            <form action="" class="form" method="POST">
                <div class="dws-input">
                        <textarea  type="text" name="schooldescription" placeholder="Опис"></textarea>
                    </div>
                
                <input class="dws-submit" type="submit" name="submit" value="Завантажити">
            </form>
        </div>
    </div>
</div>
