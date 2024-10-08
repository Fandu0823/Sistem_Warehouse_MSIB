<?php  
class Gudang {  
  private $id;  
  private $name;  
  private $location;  
  private $capacity;  
  private $status;  
  private $opening_hour;  
  private $closing_hour;  
  
  public function __construct($id, $name, $location, $capacity, $status, $opening_hour, $closing_hour) {  
   $this->id = $id;  
   $this->name = $name;  
   $this->location = $location;  
   $this->capacity = $capacity;  
   $this->status = $status;  
   $this->opening_hour = $opening_hour;  
   $this->closing_hour = $closing_hour;  
  }  
  
  public function getId() {  
    return $this->id;  
  }  
  
  public function getName() {  
    return $this->name;  
  }  
  
  public function getLocation() {  
    return $this->location;  
  }  
  
  public function getCapacity() {  
    return $this->capacity;  
  }  
  
  public function getStatus() {  
    return $this->status;  
  }  
  
  public function getOpeningHour() {  
    return $this->opening_hour;  
  }  
  
  public function getClosingHour() {  
    return $this->closing_hour;  
  }  
}
?>
