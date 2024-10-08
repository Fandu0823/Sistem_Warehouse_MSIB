<?php  
class GudangDAO {  
  private $db;  
  
  public function __construct($db) {  
    $this->db = $db;  
  }  
  
  public function create(Gudang $gudang) {  
    $query = "INSERT INTO gudang (name, location, capacity, status, opening_hour, closing_hour) VALUES (?, ?, ?, ?, ?, ?)";  
    $stmt = $this->db->prepare($query);  
    $stmt->execute(array($gudang->getName(), $gudang->getLocation(), $gudang->getCapacity(), $gudang->getStatus(), $gudang->getOpeningHour(), $gudang->getClosingHour()));  
    return $this->db->lastInsertId();  
  }  
  
  public function read() {  
    $query = "SELECT * FROM gudang";  
    $stmt = $this->db->prepare($query);  
    $stmt->execute();  
    return $stmt->fetchAll(PDO::FETCH_CLASS, 'Gudang');  
  }  
  
  public function update(Gudang $gudang) {  
    $query = "UPDATE gudang SET name = ?, location = ?, capacity = ?, status = ?, opening_hour = ?, closing_hour = ? WHERE id = ?";  
    $stmt = $this->db->prepare($query);  
    $stmt->execute(array($gudang->getName(), $gudang->getLocation(), $gudang->getCapacity(), $gudang->getStatus(), $gudang->getOpeningHour(), $gudang->getClosingHour(), $gudang->getId()));  
    return $stmt->rowCount();  
  }  
  
  public function delete($id) {  
    $query = "DELETE FROM gudang WHERE id = ?";  
    $stmt = $this->db->prepare($query);  
    $stmt->execute(array($id));  
    return $stmt->rowCount();  
  }  
}  
?>
