<?php

class FTeam_MakeTitleUrl
{

    public function make_title_url($text)
    {
        $text = trim($text);

        $text = html_entity_decode($text);
        $text = preg_replace("/(ä|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
        $text = str_replace("ç", "c", $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
        $text = preg_replace("/(ì|í|î|ị|ỉ|ĩ)/", 'i', $text);
        $text = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
        $text = preg_replace("/(ü|ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
        $text = preg_replace("/(đ)/", 'd', $text);
        //CHU HOA
        $text = trim($text);
        $text = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
        $text = str_replace("Ç", "C", $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
        $text = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
        $text = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
        $text = preg_replace("/(Đ)/", 'D', $text);
        $text = preg_replace("/ /", '-', $text);
        //Special string
        $text = preg_replace("/( |!|#|$|%|')/", '', $text);
        //$text = preg_replace("CHR(34)", '', $text);
        $text = preg_replace("/(̀|́|̉|$|>|<|=|~|!)/", '', $text);
        $text = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $text);
        $text = trim($text);
        $text = str_replace("\"", "-", $text);
        $text = str_replace("“", "-", $text);
        $text = str_replace("”", "-", $text);
        $text = str_replace(" / ", "-", $text);
        $text = str_replace("/", "-", $text);
        $text = str_replace(" - ", "-", $text);
        $text = str_replace("_", "-", $text);
        $text = str_replace(" ", "-", $text);
        $text = str_replace("ß", "ss", $text);
        $text = str_replace("&", "", $text);
        $text = str_replace("%", "", $text);
        $text = str_replace("$", "", $text);
        $text = str_replace("`", "", $text);
        $text = str_replace("^", "", $text);
        $text = str_replace("*", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace("+", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("{", "", $text);
        $text = str_replace("}", "", $text);
        $text = trim($text);
        //$text = ereg_replace("[^A-Za-z0-9-]", "", $text);
        $text = str_replace(CHR(92), "", $text);
        $text = str_replace("’", "", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace("----", "-", $text);
        $text = str_replace("---", "-", $text);
        $text = str_replace("--", "-", $text);
        $text = trim($text);
        return $text;
    }

}
