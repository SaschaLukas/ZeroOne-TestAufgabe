<?php
namespace controller;
class ShopController extends \Controller {
    
    
    public function addItem($name, $price, $amount){
        $sql = $this->getMySQL()->prepare("INSERT INTO `shop` (`preis`, `name`, `menge`) VALUES (?,?,?);");
        $sql->bind_param('isi', $price, $name, $amount);
        $sql->execute();
        
        $this->getLogger()->info('Item mit ID ' . $sql->insert_id . ' wurde erstellt');
        
        echo json_encode(array("status" => "success", "id" => $sql->insert_id));
    }
    
    public function editItem($id, $name, $price, $amount){
        $sql = $this->getMySQL()->prepare("UPDATE `shop` SET `preis`=?, `name`=?, `menge`=? WHERE `id`=? LIMIT 1;");
        $sql->bind_param('isii', $price, $name, $amount, $id);
        $sql->execute();
        
        $this->getLogger()->info('Item mit ID ' . $id . ' wurde bearbeitet');
        
        echo json_encode(array("status" => "success"));
    }
    
    public function removeItem($id){
        $sql = $this->getMySQL()->prepare("DELETE FROM `shop` WHERE  `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        
        $this->getLogger()->info('Item mit ID ' . $id . ' wurde entfernt');
        
        echo json_encode(array("status" => "success"));
    }
    
    public function getItemPrice($id){
        $sql = $this->getMySQL()->prepare("SELECT `preis` FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        echo json_encode(array("status" => "success", "response" => $result->fetch_assoc()));
    }
    
    public function getItemName($id){
        $sql = $this->getMySQL()->prepare("SELECT `name` FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        echo json_encode(array("status" => "success", "response" => $result->fetch_assoc()));
    }
    
    public function getItemAmount($id){
        $sql = $this->getMySQL()->prepare("SELECT `menge` FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        echo json_encode(array("status" => "success", "response" => $result->fetch_assoc()));
    }
    
    public function getAll($id){
        $sql = $this->getMySQL()->prepare("SELECT * FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result();
        echo json_encode(array("status" => "success", "response" => $result->fetch_assoc()));
    }
    
    public function removeCount($id, $count){
        $sql = $this->getMySQL()->prepare("UPDATE `shop` SET menge = menge - ? WHERE id=?;");
        $sql->bind_param('ii', $count, $id);
        $sql->execute();
        
        $sql2 = $this->getMySQL()->prepare("SELECT `menge` FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql2->bind_param('i', $id);
        $sql2->execute();
        $result = $sql2->get_result();
        
        $this->getLogger()->info('Item mit ID ' . $id . ' wurde um ' . $count . ' verkleinert');
        
        echo json_encode(array("status" => "success", "response" => $result->fetch_assoc()));
    }
    
    public function getQR($id){
        $sql = $this->getMySQL()->prepare("SELECT `name`, `preis` FROM `shop` WHERE `id`=? LIMIT 1;");
        $sql->bind_param('i', $id);
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        echo '<img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=' . urlencode('Name: ' . $result['name'] . ' | Preis: ' . $result['preis']) . '&choe=UTF-8">';
    }
    
    
    
}