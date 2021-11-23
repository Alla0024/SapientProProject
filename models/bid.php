<?php
class Bid
{
    public static function addBid($class, $subject, $study, $time, $other, $mysqli)
    {

        $stmt = $mysqli->prepare("INSERT INTO `bids`(`class`,`subjects`,`formstudy`,`timetable`,`other`) 
VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $class, $subject, $study, $time, $other);
        $stmt->execute();
    }
    public static function getAllClass()
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, class FROM class");
        $class->execute();
        return $class->get_result()->fetch_all();
    }
    public static function getAllSubject()
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, subjects FROM subjects");
        $class->execute();
        return $class->get_result()->fetch_all();
    }
    public static function getAllForm()
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, study FROM formstudy");
        $class->execute();
        return $class->get_result()->fetch_all();
    }
    public static function getBids()
    {
        $mysqli = dbConnect();
        $bids = $mysqli->prepare("SELECT b.id, c.class, f.study, s.subjects, b.timetable, b.other FROM bids b JOIN class c ON b.class = c.id JOIN formstudy f ON b.formstudy = f.id JOIN subjects s ON b.subjects = s.id ORDER BY b.id DESC;");
        $bids->execute();
        return $bids->get_result()->fetch_all();
    }
}
