<?php

function url($id)
{
    $add = get_instance();
    return $add->uri->segment($id);
}

function urll()
{
    return 'hai';
}

function status_icon($id)
{
    if ($id == 1) {
        return 'fa fa-check text-success';
    } else {
        return 'fa fa-times text-danger';
    }
}

function status_icon_full($id)
{
    if ($id == 1) {
        return "<i class='fa fa-check text-success'></i> ";
    } else {
        return "<i class='fa fa-times text-danger'></i> ";
    }
}

function coba_res($id)
{
    $protools = get_instance();
    $data = '';
    $result = $protools->db->get_where('detail_point', ['point_id' => $id]);
    if ($result->num_rows() > 0) {
        foreach ($result->result() as $r) {
            $data .=  status_icon_full($r->status) . $r->point_name . '<br>';
        }
    } else {
        $data = 'tidak ada';
    }

    return $data;
}

function check_image($id)
{
    if ($id == null) {
        return 'image.png';
    } else {
        return $id;
    }
}

function check_type($id)
{
    if ($id == 1) {
        return '<i data-toggle="tooltip" data-placement="top" title="Private" class="ml-2 fas fa-lock"></i>';
    } else {
        return '<i data-toggle="tooltip" data-placement="top" title="Public" class="ml-2 fas fa-lock-open"></i>';
    }
}

function image_user($username)
{
    $add = get_instance();
    return $add->db->get_where('user', ['username' => $username])->row()->image;
}
