<?php
/**
 * @author=> Tio Agustian <tio.agustian94@gmail.com>
 * Website=> https=>//tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */

header('Content-Type: application/json');

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'duration']);
    }

    public function index()
    {
        return ;
    }

    public function getAvailableServices($id = false, $duration = false)
    {
        if (!$id) {
            $query = $this->db->get('services');
        } else {
            $query = $this->db->get_where('services', ['id' => $id]);
        }
        if (count($query->result()) < 1) {
            die('null');
        }
        if ($id && $duration) {
            $times = explode(',',$query->row()->duration);
            foreach ($times as $time) {
                $timeText = getDurationValue($time);
                $data['results'][] = ['id' => $time, 'text' => $timeText . ' menit'];
            }
        } else {
            foreach ($query->result() as $row) {
                $data['results'][] = ["id" => $row->id, "text" => $row->name];
            }
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAvailableTherapis()
    {
        $service = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        if (!$service) {
            echo json_encode([
                "status" => false,
                "service_id" => null,
                "message" => "service_id cannot be null",
                "length" => null,
                "results" => null
            ], JSON_PRETTY_PRINT);
            return;
        }

        $getService = $this->db->get_where('services', ["id" => $service])->row();

        if (is_null($getService)) {
            $data = [
                "status" => false,
                "service_id" => $service,
                "message" => "sorry, we can't find any services for this services_id",
                "length" => null,
                "results" => null
            ];
            echo json_encode($data, JSON_PRETTY_PRINT);
            return;
        }

        $query = "SELECT
                    workers.id,
                    workers.name AS text
                FROM worker_services
                    INNER JOIN workers
                    ON worker_services.worker_id = workers.id
                WHERE worker_services.service_id = $service";

        $result = $this->db->query($query)->result();

        if (count($result) <= 0) {
            $data = [
                "status" => false,
                "service_id" => $service,
                "service_name" => $getService->name,
                "message" => "sorry, we can't find any worker for this services_id",
                "length" => count($result),
                "results" => null
            ];
            echo json_encode($data, JSON_PRETTY_PRINT);
            return;
        }

        $data = [
            "status" => true,
            "service_id" => $service,
            "service_name" => $getService->name,
            "length" => count($result),
            "results" => $result
        ];
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAvailableDate()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes($_GET['duration']) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $now = date('m/d/Y', strtotime('now'));
        $room = [1 => 'Kamar 1'];
        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 10 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $durationArray = getDurationArray();
        $dump_data = [
            '1' => [
                '10:00:00' => '90',
                '11:45:00' => '60',
                '13:50:00' => '60'
            ]
        ];
        foreach ($dump_data as $room => $on) {
            $i = 0;
            $state = [];
            foreach ($on as $times => $duration) {
                $startTime = strtotime($now . ' ' . $times);
                $durationTime = $duration * 60;
                $totalTime = $startTime + $durationTime + $cooldown;
                if ($i > 0) {
                    // echo ($startTime - $state[$i -1]) / 60 . ' | ';
                    $division = ($startTime - $state[$i -1]) / 60;
                    foreach (getDurationArray() as $dr) {

                        if (($dr + 10 <= ($division))) {
                            // echo date('d/m/Y H:i:s',$totalTime) . " - " . date('d/m/Y H:i:s',$totalTime + ( getDurationValue($d) + 10 * 60 ) ) . " [".( getDurationValue($d) + 10 ). " | $dr |" ." $division]";
                            $available[$room][] = [date('d/m/Y H:i:s',$totalTime) => $dr];
                        }

                    }
                    
                }
                $state[$i] = $totalTime;
                $i++;
                // echo date('d/m/Y H:i:s', $startTime) . ' - ' . date('d/m/Y H:i:s',$totalTime) . ' | ';
            }
        }
        if (count($available) > 0) {
            echo json_encode($available, JSON_PRETTY_PRINT);
        }
        // echo strtotime('06/12/2019 10:00:00'). ' | ';
        // echo date('d/m/Y, H:i:s', strtotime('06/12/2019 10:00:00'));
    }

}

