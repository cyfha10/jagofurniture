<?php

class General_model extends CI_Model
{

    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function insert_product($data)
    {
        return $this->db->insert('products', $data);
    }

    // Update product
    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    // Delete product
    public function delete_product($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    // Get all products
    public function get_all_products()
    {
        return $this->db->get('products')->result();
    }

    // Get a single product by ID
    public function get_product_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('products')->row();
    }


    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_sort($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'ASC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_sort_where($table, $where, $order_by, $sort)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, $sort);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_limit($table, $order_by, $sort, $limit1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, $sort);
        $this->db->limit($limit1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_limit_where($table, $where, $order_by, $sort, $limit1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, $sort);
        $this->db->limit($limit1);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_where_one($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }


    public function get_one($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_date($table, $where, $field_between, $start, $end)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where("$field_between BETWEEN '$start' AND '$end'");

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_sort($table, $where, $order_by, $sort)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, $sort);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_ones($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    public function get_one_many($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_many_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_orderby_one($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'DESC');

        return $this->db->get()->row();
    }

    public function get_orderby_many($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'ASC');

        return $this->db->get()->result_array();
    }

    public function get_orderby_where_one($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');

        return $this->db->get()->row();
    }

    public function get_one_many_orderby($table, $where, $id, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);
        $this->db->order_by($order_by, 'DESC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function insert_get_id($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function insert_batch($table, $data)
    {
        $insert =  $this->db->insert_batch($table, $data);
        return ($insert) ? true : false;
    }

    public function update_batch($table, $data, $where1)
    {
        $update = $this->db->update_batch($table, $data, $where1);
        $response = false;
        if ($update != null) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    public function update_batch2($table, $data, $where1, $where2)
    {
        $this->db->where($where2, null, false); // Check for IS NULL

        $update = $this->db->update_batch($table, $data, $where1);
        return ($update != null) ? true : false;
    }

    function update($table, $data, $where, $id)
    {

        $this->db->trans_begin();

        $this->db->where($where, $id);
        $this->db->update($table, $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }



    function delete($table, $where, $id)
    {
        $this->db->where($where, $id);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    function delete_where($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    public function get_join($table, $table2, $join_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_where($table, $table2, $join_id, $where, $where_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where, $where_id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_where_sort($table, $table2, $join_id, $where, $where_id, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where, $where_id);
        $this->db->order_by($order_by, 'ASC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_wheres($table, $table2, $join_id, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_dua($table, $table2, $table3, $join_id, $join_id2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_dua_where($table, $table2, $table3, $join_id, $join_id2, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_tiga($table, $table2, $table3, $table4, $join_id, $join_id2, $join_id3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_empat($table, $table2, $table3, $table4, $table5, $join_id, $join_id2, $join_id3, $join_id4)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');
        $this->db->join($table5, $join_id4, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function count($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }


    public function get_forpagination($table, $limit, $start)
    {
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }

    public function get_last_id($table, $order_by)
    {
        $query = $this->db->query("
            SELECT * FROM $table ORDER BY $order_by DESC LIMIT 1
            ")->row();
        return $query;
    }

    public function get_lastid_where($table, $where, $order_by)
    {
        $query = $this->db->query("
            SELECT * FROM $table WHERE $where ORDER BY $order_by DESC LIMIT 1
            ")->row();
        return $query;
    }

    public function last_id_where($table, $where, $order_by)
    {
        $query = $this->db->query("SELECT * FROM $table WHERE $order_by = (SELECT MAX($order_by) FROM $table WHERE $where)")->row();
        return $query;
    }

    public function last_id_where_one($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();

        // $query = $this->db->query("SELECT * FROM $table WHERE $order_by = (SELECT MAX($order_by) FROM $table WHERE $where)")->row();
        // return $query;
    }

    public function last_id_where_asc($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'ASC');
        //$this->db->limit(1);

        return $this->db->get()->row();
    }

    public function get_sum($table, $sum)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum FROM $table")->row();
        return $query;
    }

    public function get_sum_where($table, $where, $sum)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where")->row();
        return $query;
    }

    public function get_sum_where_date($table, $where = "", $sum, $field_between, $start, $end)
    {
        if ($where != '' || $where != null) {
            $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'")->row();
        } else {
            $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $field_between BETWEEN '$start' AND '$end'")->row();
        }
        return $query;
    }

    function update_where($table, $data, $where)
    {

        $this->db->trans_begin();

        $this->db->where($where);
        $this->db->update($table, $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function get_sum_between_where($table, $where, $sum, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'")->row();
        return $query;
    }

    public function get_between_where($table, $where, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function get_between($table, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM $table $field_between BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function query_count($table, $where, $start, $end)
    {
        $query = $this->db->query("
            SELECT count(*) AS jumlah FROM $table WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_count_custom($table, $where, $date, $start, $end)
    {
        $query = $this->db->query("
            SELECT count(*) AS jumlah FROM $table WHERE $where AND $date BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_sum_where($table, $select, $where)
    {
        $query = $this->db->query("
                SELECT $select FROM $table WHERE $where")->row();

        return $query;
    }

    public function query($sql)
    {
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function query_custom($sql)
    {
        $query = $this->db->query($sql)->row();
        return $query;
    }

    public function get_distinct($table, $distinct)
    {
        $query = $this->db->query("SELECT DISTINCT($distinct) FROM $table")->result_array();
        return $query;
    }

    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
