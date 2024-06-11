<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_report extends CI_Model
{
    function getReport()
    {
        $this->db->select('dt_report_datetime, dt_report_countusing, dt_report_countnotusing, dt_report_counttotal, dt_report_status');
        $this->db->from('tb_dt_report');
        $query = $this->db->get();
        return $query->result();
    }

    function filterbytanggal($tanggalawal, $tanggalakhir)
    {
        //$query = $this->db->query("SELECT * FROM  tb_dt_report WHERE tb_dt_report.dt_report_datetime between '$tanggalawal' and '$tanggalakhir' ORDER BY tb_dt_report.dt_report_datetime ASC");
        $query = $this->db->query("SELECT dt_report_datetime as rdatetime ,SUM (dt_report_countusing) as wearing, SUM (dt_report_countnotusing) as notwearing, SUM(dt_report_counttotal) as total, dt_report_status as stat FROM  tb_dt_report 
        WHERE tb_dt_report.dt_report_datetime between '$tanggalawal' and '$tanggalakhir' GROUP BY tb_dt_report.dt_report_datetime, tb_dt_report.dt_report_status 
        ORDER BY tb_dt_report.dt_report_datetime ASC");
        /* $query = $this->db->query("SELECT * FROM  tb_dt_report WHERE (dt_report_datetime BETWEEN '".$tanggalawal."' AND '".$tanggalakhir."')"); */

        return $query->result();
    }

    function filterbytanggal2($tanggalawal, $tanggalakhir)
    {
        $query = $this->db->query("SELECT DAY(dt_report_datetime) as dday, MONTH(dt_report_datetime) as dmonth, YEAR(dt_report_datetime) as dyear, SUM (dt_report_countusing) as wearing, SUM (dt_report_countnotusing) as notwearing, SUM(dt_report_counttotal) as total 
        FROM  tb_dt_report WHERE tb_dt_report.dt_report_datetime between '$tanggalawal' and '$tanggalakhir' GROUP BY DAY(dt_report_datetime), MONTH(dt_report_datetime), YEAR(dt_report_datetime)
        ORDER BY DAY(dt_report_datetime) ASC");

        return $query->result();
    }
}
