<?php

class Response {
    public $id;
    public $quest_id;
    public $point;
    public $answer;

    public static function getAllByQuestionId($quest_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM respond WHERE quest_id = ?");
        $stmt->execute([$quest_id]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Response');
    }

    public static function getById($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM respond WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject('Response');
    }

    public function save() {
        $db = Database::getConnection();
        if ($this->id) {
            $stmt = $db->prepare("UPDATE respond SET point = ?, answer = ? WHERE id = ?");
            $stmt->execute([$this->point, $this->answer, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO respond (quest_id, point, answer) VALUES (?, ?, ?)");
            $stmt->execute([$this->quest_id, $this->point, $this->answer]);
            $this->id = $db->lastInsertId();
        }
    }

    public function delete() {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM respond WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}
?>