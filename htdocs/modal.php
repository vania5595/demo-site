<?php
//Modal Prototype
class Modal{
    protected $title="";
    
    public $id="modal";

    protected $modal_size = "modal-sm"; 

    protected function getContent(){
        return "";
    }

    public function render(){
        $modal_content=$this->getContent();
        echo "<div class='modal fade' id='".$this->id."'>";
            echo "<div class='modal-dialog ".$this->modal_size."'>";
                echo "<div class=modal-content>";
                    echo "<div class=modal-header>";
                        echo "<h5 class=modal-title>".$this->title."</h5>";
                        echo "<button type=button class=close data-dismiss=modal><span>&times;</span></button>";
                    echo "</div>";
                    echo "<div class=modal-body>";
                        echo $modal_content;
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>"; 
    }
}
?>