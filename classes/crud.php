<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mano_project";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

class CRUD
{

    function add_blog($title)
    {
        global $db;
        $stmt = $db->prepare("INSERT INTO crud (title) VALUES (:title)");
        $stmt->execute(array(':title' => $title));
    }

    function show_blogs()
    {
        global $db;
        $stmt = $db->query("SELECT * FROM crud");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function edit_blogs($id, $title)
    {
        global $db;
        $stmt = $db->prepare("UPDATE crud  SET title = :title where id = :id");
        $stmt->execute(array(':title' => $title, ':id' => (int)$id));
    }
    function show_blogs_id($id)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM crud WHERE id = :id");
        $stmt->execute(array(':id' => (int)$id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function delete_blogs($id)
    {
        global $db;
        $stmt = $db->prepare("DELETE FROM crud WHERE id = :id");
        $stmt->execute(array(':id' => (int)$id));
    }
}
