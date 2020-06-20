<?php 
class Person {
    
    public $name;
    public $salary;
    public $room;
    public $telNum;
    public $picture;
    public $keyword;

  
    function __construct($name, $salary, $room, $telNum, $picture, $keyword) {
      $this->name = $name;
      $this->salary = $salary;
      $this->room = $room;
      $this->telNum = $telNum;
      $this->picture = $picture;
      $this->keyword = $keyword;
    }

    function get_name() {
        return $this->name;
    }
    function get_salary() {
        return $this->salary;
    }
    function get_room() {
      return $this->room;
    }
    function get_telNum() {
        return $this->telNum;
    }
    function get_picture() {
        return $this->picture;
    }
    function get_keyword() {
        return $this->keyword;
    }
  }
?>