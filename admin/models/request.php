<?php
class Request
{
    public static function addRequest($class, $subject, $study, $time, $other)
    {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("INSERT INTO `requests`(`class`,`subjects`,`formstudy`,`timetable`,`other`) 
    VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $class, $subject, $study, $time, $other);
        $stmt->execute();
    }
    public static function deleteRequest($request_id)
    {
        $mysqli = dbConnect();
        $delete_request = $mysqli->prepare("DELETE FROM requests WHERE id=?");
        $delete_request->bind_param("s", $request_id);
        $delete_request->execute();
    }
    public static function getRequests()
    {
        $mysqli = dbConnect();
        $requests = $mysqli->prepare("SELECT r.id, c.class, f.study, s.subjects, r.timetable, r.other FROM requests r JOIN class c ON r.class = c.id JOIN formstudy f ON r.formstudy = f.id JOIN subjects s ON r.subjects = s.id ORDER BY r.id DESC;");
        $requests->execute();
        return $requests->get_result()->fetch_all();
    }
    public static function getRequestById($request_id)
    {
        $mysqli = dbConnect();
        $edit_request = $mysqli->prepare("SELECT r.id, c.id as class_id, c.class, f.id as form_study_id, f.study, s.id as subject_id, s.subjects, r.timetable, r.other FROM requests r JOIN class c ON r.class = c.id JOIN formstudy f ON r.formstudy = f.id JOIN subjects s ON r.subjects = s.id WHERE r.id=?;");
        $edit_request->bind_param("s", $request_id);
        $edit_request->execute();
        return $edit_request->get_result()->fetch_assoc();
    }
    public static function updateRequestsEdit($class, $subjects, $formstady, $timetable, $other, $request_id)
    {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("UPDATE `requests` SET `class`=?, `subjects`=?, `formstudy`=?, `timetable`=?, `other`=? WHERE id=?");
        $stmt->bind_param('ssssss', $class, $subjects, $formstady, $timetable, $other, $request_id);
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
