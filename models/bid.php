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
        $class = $mysqli->prepare("SELECT id, class, description FROM class");
        $class->execute();
        return $class->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public static function getAllClassWithPagination($limit, $offset)
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, class, description, image FROM class LIMIT ? OFFSET ?");
        $class->bind_param("ss", $limit, $offset);
        $class->execute();
        return $class->get_result()->fetch_all(MYSQLI_ASSOC);
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
    public static function deleteBid($bid_id)
    {
        $mysqli = dbConnect();
        $delete_bid = $mysqli->prepare("DELETE FROM bids WHERE id=?");
        $delete_bid->bind_param("s", $bid_id);
        $delete_bid->execute();
    }
    public static function getBidById($bid_id)
    {
        $mysqli = dbConnect();
        $edit_bid = $mysqli->prepare("SELECT b.id, c.id as class_id, c.class, f.id as form_study_id, f.study, s.id as subject_id, s.subjects, b.timetable, b.other FROM bids b JOIN class c ON b.class = c.id JOIN formstudy f ON b.formstudy = f.id JOIN subjects s ON b.subjects = s.id WHERE b.id=?;");
        $edit_bid->bind_param("s", $bid_id);
        $edit_bid->execute();
        return $edit_bid->get_result()->fetch_assoc();
    }
    public static function updateBidsEdit($class, $subjects, $formstady, $timetable, $other, $bid_id)
    {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("UPDATE `bids` SET `class`=?, `subjects`=?, `formstudy`=?, `timetable`=?, `other`=? WHERE id=?");
        $stmt->bind_param('ssssss', $class, $subjects, $formstady, $timetable, $other, $bid_id);
        $stmt->execute();
    }
    public static function getClassById($class_id)
    {
        $mysqli = dbConnect();
        $class = $mysqli->prepare("SELECT id, class, image, description FROM `class` WHERE id=?;");
        $class->bind_param("s", $class_id);
        $class->execute();
        return $class->get_result()->fetch_assoc();
    }
    public static function countRow()
    {
        $mysqli = dbConnect();
        $count_row = $mysqli->prepare("SELECT COUNT(*) FROM `class`");
        $count_row->execute();
        return $count_row->get_result()->fetch_row()[0];
    }
    

public static function addImg($img, $id)
{
    $mysqli = dbConnect();
     $stmt = $mysqli->prepare("UPDATE class SET image = ? WheRE id=?");
     $stmt->bind_param("ss", $img, $id);
    $stmt->execute();
} 
public static function getAllImages()
{
    $mysqli = dbConnect();
    $images = $mysqli->prepare("SELECT * FROM images ORDER BY id DESC");
    $images->execute();
    return $images->get_result()->fetch_all(MYSQLI_ASSOC);
}

    
}