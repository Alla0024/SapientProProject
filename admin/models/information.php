<?php
class Information
{
    public static function addSchoolDescription($schooldescription)
    {
        $mysqli = dbConnect();

        $stmt = $mysqli->prepare("INSERT INTO `about`(`schooldescription`) 
    VALUES (?)");
        $stmt->bind_param("s", $schooldescription);
        $stmt->execute();
    }
    public static function addRegistration($name, $username, $password1, $password2,  $email, $phone, $country)
    {
        $mysqli = dbConnect();

        $stmt = $mysqli->prepare("INSERT INTO `registration`(`name`,`username`,`password1`,`password2`,`email`,`phone`,`country`) 
    VALUES (?,?,?,?,?,?,? )");
        $stmt->bind_param("sssssss", $name, $username, $password1, $password2,  $email, $phone, $country);
        $stmt->execute();
    }
}