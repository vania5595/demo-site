<?php
//Small common functions
function bold_text($str){
    return "<b>".$str."</b>";
}
function form_label($str){
    return "<h5 class='mt-2'>".$str."</h5>";
}
function input_widget($name,$type,$addon=""){
    return "<input ".$addon." required class='form-control' type=".$type." name=".$name.">";
}
function submit_widget($str){
    return "<center><button type=submit class='btn btn-primary mt-3 btn-lg'>".$str."</button></center>";
}
function container($str){
    return "<div class=container-fluid>".$str."</div>";
}
function row($str){
    return "<div class=row>".$str."</div>";
}
function col($str){
    return "<div class=col>".$str."</div>";
}
function radio_widget($name,$value){
    return "<input required type=radio name='".$name."' id='".$value."' value='".$value."'>";
}
function test_date($str){
    $test_arr  = explode('-', $str);
    if (count($test_arr) == 3) {
        if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
            return true;
        }
    }
    return false;
}
?>