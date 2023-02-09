<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!empty($ci->session->userdata('jabatan'))) {
        if ($ci->session->userdata('jabatan') == 'Manager') {
            redirect(base_url('manager/dashboard'));
        } elseif ($ci->session->userdata('jabatan') == 'Kasir') {
            redirect(base_url('kasir/dashboard'));
        }
    }
}

function create_kodetransaksi()
    {
        $ci = get_instance();
        $ci->db->select('RIGHT(total.kode_transaksi,2) as kode_transaksi', FALSE);
        $ci->db->order_by('kode_transaksi','DESC');    
        $ci->db->limit(1);    
        $query = $ci->db->get('total');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kode_transaksi) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
        $kodetampil = "TR".$batas;
        return $kodetampil;  
    }

function check_login()
{
    $ci = get_instance();

    if (empty($ci->session->userdata('jabatan'))) {
        redirect(base_url('login'));
    }
    // if (!empty($ci->session->userdata('jabatan'))) {
    //     if ($ci->session->userdata('jabatan') == 'Manager') {
    //         redirect(base_url('manager/dashboard'));
    //     } elseif ($ci->session->userdata('jabatan') == 'Kasir') {
    //         redirect(base_url('kasir/dashboard'));
    //     }
    // }

    // if ($ci->session->userdata('jabatan') == 'Manager') {
    //     redirect(base_url('dashboard_manajer'));
    // }elseif ($ci->session->userdata('jabatan') == 'Kasir') {
    //     redirect(base_url('dashboard_kasir'));
    // }
}