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
        return;
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

    public function getDisabledDate()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes($_GET['duration']) : false;
        $id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $query = $this->db->get_where('worker_offday', ['worker_id' => $id])->result_array();
        $result = [];
        foreach ($query as $row) {
            $result[] = date('d/m/Y', strtotime($row['date']));
        }
        echo json_encode($result, JSON_PRETTY_PRINT);
        return;
    }

    public function getAvailableTime()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes($_GET['duration']) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
        $now = date('m/d/Y', strtotime($date));
        $rooms = [];
        foreach ($this->db->get('rooms')->result_array() as $r_arr) {
            $rooms[$r_arr['id']] = $r_arr['name'];
        }
        // die(json_encode($now, JSON_PRETTY_PRINT));
        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $output = [];
        $records = [];
        $durationArray = getDurationArray();
        $dump_data = [
            '1' => [
                '11:30:00' => '60',
                '12:45:00' => '60',
                '15:00:00' => '60'
            ],
            '2' => [
                '11:30:00' => '60',
                '12:45:00' => '60',
                '15:00:00' => '60'
            ]
        ];

        foreach ($dump_data as $room => $times) {

            $timeIndex = 0;
            
            foreach ($times as $time => $duration) {

                $startTime = strtotime($now . ' ' . $time);
                $endTime = $startTime + ($duration * 60);
                $lastIndex[] = $endTime;
                $lastTime = '';
                $i = 0;
                foreach ($durationArray as $d) {
                    
                    if ($timeIndex == 0) {
                        $value = $startTime - $open;
                        $at = $open;
                    } else {
                        $value = $startTime - $lastIndex[$timeIndex - 1];
                        $at = $lastIndex[$timeIndex - 1];
                    }
                    
                    $minimumDuration = ($d * 60) + $cooldown;
                    if ($value > $minimumDuration) {
                        $available[$room][] = $d . " minutes start at " . date('H:i:s', $at) .", end at " . date('H:i:s', $at + $minimumDuration) . " room " . $room;
                        
                        if ($lastTime != date('H:i:s', $at) && !in_array(date('H:i:s', $at), $records)) {
                            $output['results'][] = ['id' => date('H:i:s', $at), 'text' => date('H:i', $at)];
                        }
                        $lastTime = date('H:i:s', $at);
                        $records[] = date('H:i:s', $at);
                        $i++;

                    }

                }

                $timeIndex++;
            }

        }

        if (count($available) > 0) {
            echo json_encode($output, JSON_PRETTY_PRINT);
        }
    }

    public function getAvailableRooms()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes($_GET['duration']) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $time_selected = (isset($_GET['time'])) ? addslashes($_GET['time']) : false;
        $now = date('m/d/Y', strtotime('now'));
        $rooms = [1 => 'Kamar 1', 2 => 'Kamar 2'];
        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $output = [];
        $records = [];
        $durationArray = getDurationArray();
        $dump_data = [
            '1' => [
                '11:30:00' => '60',
                '12:45:00' => '60',
                '15:00:00' => '60'
            ],
            '2' => [
                '11:30:00' => '60',
                '12:45:00' => '60',
                '15:00:00' => '60'
            ]
        ];

        foreach ($dump_data as $room => $times) {

            $timeIndex = 0;
            
            foreach ($times as $time => $duration) {

                $startTime = strtotime($now . ' ' . $time);
                $endTime = $startTime + ($duration * 60);
                $lastIndex[] = $endTime;
                $lastTime = '';
                $i = 0;

                foreach ($durationArray as $d) {
                    
                    if ($timeIndex == 0) {
                        $value = $startTime - $open;
                        $at = $open;
                    } else {
                        $value = $startTime - $lastIndex[$timeIndex - 1];
                        $at = $lastIndex[$timeIndex - 1];
                    }
                    
                    $minimumDuration = ($d * 60) + $cooldown;
                    if ($value > $minimumDuration) {
                        if (date('H:i:s', $at) == $time_selected && !in_array($room, $records)) {

                            $output['results'][] = ['id' => $room, 'text' => $rooms[$room]];
                            $records[] = $room;
                        }
                        $lastTime = date('H:i:s', $at);
                        
                        $i++;

                    }

                }

                $timeIndex++;
            }

        }

        echo json_encode($output, JSON_PRETTY_PRINT);
    }

}

