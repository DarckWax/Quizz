<?php

class Quizz {
    public $id;
    public $user_id;
    public $title;
    public $published;

    public static function getAll() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM quizz");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Quizz');
    }

    public static function getById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM quizz WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Quizz');
    }

    public function save() {
        $db = Database::getConnection();
        if ($this->id) {
            $stmt = $db->prepare("UPDATE quizz SET title = ?, published = ? WHERE id = ?");
            $stmt->execute([$this->title, $this->published, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO quizz (user_id, title, published) VALUES (?, ?, ?)");
            $stmt->execute([$this->user_id, $this->title, $this->published]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete() {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM quizz WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
?>