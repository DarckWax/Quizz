<?php

class Question {
    public $id;
    public $quizz_id;
    public $title;
    public $multi;

    public static function getAllByQuizzId($quizz_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM quest WHERE quizz_id = ?");
        $stmt->execute([$quizz_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Question');
    }

    public static function getById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM quest WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Question');
    }

    public function save() {
        $db = Database::getConnection();
        if ($this->id) {
            $stmt = $db->prepare("UPDATE quest SET title = ?, multi = ? WHERE id = ?");
            $stmt->execute([$this->title, $this->multi, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO quest (quizz_id, title, multi) VALUES (?, ?, ?)");
            $stmt->execute([$this->quizz_id, $this->title, $this->multi]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete() {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM quest WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
?>