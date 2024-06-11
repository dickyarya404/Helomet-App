<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{
    function datafieldterakhir()
    {
        //$query = $this->db->query("SELECT * FROM `tb_dt_report` ORDER BY dt_report_id DESC LIMIT 1"); //for mysql
        $query = $this->db->query("SELECT TOP 1 * FROM tb_dt_report ORDER BY dt_report_id DESC"); //for sql sever
        /* $this->db->select('*');
        $this->db->from('tb_dt_report');
        $this->db->order_by('tb_dt_report.dt_report_id','desc limit',1);
        $query = $this->db->get()->row(); */
        return $query->row();
    }

    function getReport()
    {
        $this->db->select('dt_report_datetime, dt_report_countusing, dt_report_countnotusing, dt_report_counttotal, dt_report_status');
        $this->db->from('tb_dt_report');
        $query = $this->db->get();
        return $query->result();
    }

    public function getReportByDate($tAwal, $tAkhir)
    {
        $query =  $this->db->query("SELECT dt_report_datetime, dt_report_countusing, dt_report_countnotusing, dt_report_counttotal, dt_report_status from tb_dt_report
        WHERE tb_dt_report.dt_report_datetime between '$tAwal' and '$tAkhir' 
        ORDER BY tb_dt_report.dt_report_datetime ASC");
        return $query->result();
    }

    public function chartbarByDate($tAwal, $tAkhir)
    {
        $query =  $this->db->query("SELECT FORMAT(dt_report_datetime, 'dd-MM-yyyy') as tanggal , SUM (dt_report_countusing) as wearing, SUM (dt_report_countnotusing) as notwearing, SUM(dt_report_counttotal) as total
        FROM  tb_dt_report WHERE tb_dt_report.dt_report_datetime between '$tAwal' and '$tAkhir' GROUP BY FORMAT(dt_report_datetime, 'dd-MM-yyyy')
        ORDER BY tanggal ASC");
        return $query->result();
    }

    public function chartbarAllData()
    {
        $query =  $this->db->query("SELECT FORMAT(dt_report_datetime, 'dd-MM-yyyy') as tanggal, SUM (dt_report_countusing) as wearing, SUM (dt_report_countnotusing) as notwearing FROM  tb_dt_report 
        GROUP BY tb_dt_report.dt_report_datetime 
        ORDER BY tb_dt_report.dt_report_datetime ASC");
        return $query->result();
    }

    public function chartpieByDate($tAwal, $tAkhir)
    {
        $query =  $this->db->query("SELECT SUM (dt_report_countusing) as wearingpie, SUM (dt_report_countnotusing) as notwearingpie FROM  tb_dt_report 
        WHERE tb_dt_report.dt_report_datetime between '$tAwal' and '$tAkhir'");
        return $query->result();
    }

    public function chartpieAllData()
    {
        $query =  $this->db->query("SELECT SUM (dt_report_countusing) as wearingpie, SUM (dt_report_countnotusing) as notwearingpie FROM  tb_dt_report");
        return $query->result();
    }
}
