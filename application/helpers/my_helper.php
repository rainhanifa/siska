<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



function getUtangMember($id_member){
    $CI =& get_instance();

    $where  =   array("member_id" => $id_member);
    $total  =   $CI->db->select("SUM(total) AS total")->from("transaction_income")->where($where)->get()->row()->total;
    return $total;
}

function getPiutangMember($id_member){
    $CI =& get_instance();

    $where  =   array("member_id" => $id_member);
    $total  =   $CI->db->select("SUM(total) AS total")->from("transaction_outcome")->where($where)->get()->row()->total;
    return $total;
}

function getDendaMember($id_member){
    $CI =& get_instance();

    $where  =   array("member_id" => $id_member);
    $total  =   $CI->db->select("SUM(total) AS total")->from("transaction_fine")->where($where)->get()->row()->total;
    return $total;
}

function rupiah($number){
    return "Rp " . number_format($number,0,',','.');
}
