<?php

function render($view, $data=[])
{
    $ci =& get_instance();
    $layout = $data;
    $layout['content'] = $ci->load->view($view, $data, TRUE);
    $ci->load->view('layout', $layout);
}

function isLogin()
{
    $ci =& get_instance();
    return $ci->session->has_userdata('username');
}