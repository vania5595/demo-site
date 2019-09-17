<?php
//Multi Language Engine

class Language{
    public $dictonary = array ();
    public $name = "none";
    public $full_name = "None";
    public function getWord($word_id,$ntag="span",$addon=""){
        return "<".$ntag." name='".$word_id."' ".$addon.">".$this->dictonary[$word_id]."</span>";
    }
}
//Language Select Widget
class LanguageSelectWidget{
    protected $languages_list;

    function __construct($languages){
        $this->languages_list=$languages;
    }

    public function renderScripts(){
        //Render Script for fast lang change
        echo "<script>";
        echo "function changeWords(wk,wv){";
        echo "for(let wor of document.getElementsByName(wk))wor.innerHTML=wv;";
        echo "}";
        
        foreach( $this->languages_list as $language ){
            echo "function set_".$language->name."(){";
            echo "document.cookie = 'lang=".$language->name."; path=/; expires=Tue, 19 Jan 2038 03:14:07 GMT';";
                foreach( $language->dictonary as $dict_key => $dict_word )
                    echo "changeWords('".$dict_key."','".$dict_word."');";
            echo "}";
        }
        echo "</script>";
        
    }

    public function renderWidget(){
        //Multi Select Widget 
        global $current_language;
        $languages_list_html="";
        foreach( $this->languages_list as $language ){
            $languages_list_html=$languages_list_html."<button type=button class=btn onclick=set_".$language->name."()>".$language->dictonary["Flag"].$language->full_name."</button><br>";
        }
        return "<div class='dropdown show float-right ml-3 mt-2 dropleft'>".
            "<a class='btn btn-secondary' href=# data-toggle=dropdown >".$current_language->getWord("Flag")."</a>".
            "<div class=dropdown-menu>".
            $languages_list_html.
            "</div>".
        "</div>";
    }


}
?>