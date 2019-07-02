<?php
/**
 * @author=> Tio Agustian <tio.agustian94@gmail.com>
 * Website=> https=>//tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * 
 */

header('Content-Type: application/json');

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller
{

    private $timeResult = [];

    private $roomResult = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'duration']);
        $this->load->model('order');
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
                    workers.name,
                    workers.gender
                FROM worker_services
                    INNER JOIN workers
                    ON worker_services.worker_id = workers.id
                WHERE worker_services.service_id = $service";

        $get = $this->db->query($query)->result();

        $results = [];

        $results[0] = ['id' => 1000, 'text' => 'Laki-laki (acak)', 'disabled' => true];
        $results[1] = ['id' => 1001, 'text' => 'Perempuan (acak)', 'disabled' => true];
        $results[2]['text'] = 'Laki-laki';
        $results[2]['children'] = [];
        $results[3]['text'] = 'Perempuan';
        $results[4]['children'] = [];

        foreach ($get as $result) {
            switch ($result->gender) {
                case 'P':
                    $results[1] = ['id' => 1001, 'text' => 'Perempuan (acak)'];
                    $results[3]['text'] = 'Perempuan';
                    $results[3]['children'][] = ['id' => $result->id, 'text' => $result->name];
                    break;
                
                default:
                    $results[0] = ['id' => 1000, 'text' => 'Laki-laki (acak)'];
                    $results[2]['text'] = 'Laki-laki';
                    $results[2]['children'][] = ['id' => $result->id, 'text' => $result->name];
                    break;
            }
        }

        if (count($get) <= 0) {
            $data = [
                "status" => false,
                "service_id" => $service,
                "service_name" => $getService->name,
                "message" => "sorry, we can't find any worker for this services_id",
                "length" => count($results),
                "results" => null
            ];
            echo json_encode($data, JSON_PRETTY_PRINT);
            return;
        }

        $data = [
            "status" => true,
            "service_id" => $service,
            "service_name" => $getService->name,
            "length" => count($results),
            "results" => $results
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
        $duration = (isset($_GET['duration'])) ? addslashes(getDurationValue($_GET['duration'])) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
        $time_selected = (isset($_GET['time'])) ? addslashes($_GET['time']) : false;
        $now = date('Y/m/d', strtotime($date));
        $rooms = [];
        foreach ($this->db->get('rooms')->result_array() as $r_arr) {
            $rooms[$r_arr['id']] = $r_arr['name'];
        }

        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $output = [];
        $records = [];
        $booked = [];
        $data = [];
        $onService = [];
        $durationArray = getDurationArray();
        $datas = $this->db->get_where('service_order_detail', ['date' => $now])->result_array();

        foreach ($datas as $dt) {

            $booked[$dt['room_id']][$dt['time']] = $dt['duration'];
            $onService[$dt['worker_id']] = [1 => strtotime($now . ' ' . $dt['time']), 2 => strtotime($now . ' ' . $dt['time']) + ($dt['duration'] * 60)];
        }
        
        foreach ($rooms as $key => $value) {
            if (isset($booked[$key])) {
                $data[$key] = $booked[$key];
            } else {
                $data[$key] = [];
            }
        }

        if ($therapis_id > 999) {
            return $this->randomizeT($open, $data, $duration, $cooldown, $close, $onService, $service_id, $therapis_id);
        }

        foreach ($data as $room => $times) {
            $startTime = $open;
            $timeIndex = 1;
            $endIndex = count($times);

            if ($endIndex == 0) {
                $this->timeLoop($duration, $cooldown, $startTime, $close, $room, $onService, $therapis_id);
            }
            foreach ($times as $time => $dr) {

                $bookedTime = strtotime($now . ' ' . $time);
                $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                if ($timeIndex == $endIndex) {
                    $this->timeLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $therapis_id);
                    $startTime = $open;
                    $timeIndex = 0;
                } else {
                    $this->timeLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $therapis_id);
                    $startTime = $endBook;
                    $timeIndex ++;
                }
            }
        }
        sort($this->timeResult);

        foreach ($this->timeResult as $value) {
            $output['results'][] = ['id' => $value, 'text' => $value];
        }

        echo json_encode($output , JSON_PRETTY_PRINT);
    }

    public function getAvailableRooms($int = false, $service_id = '', $duration = '', $therapis_id = '', $date = '', $time_selected = '', $room_id = '')
    {
        if (!$int) {
            $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
            $duration = (isset($_GET['duration'])) ? addslashes(getDurationValue($_GET['duration'])) : false;
            $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
            $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
            $time_selected = (isset($_GET['time'])) ? addslashes($_GET['time']) : false;
        } else {
            $duration = addslashes($duration);
        }

        $now = date('Y/m/d', strtotime($date));
        $rooms = [];
        foreach ($this->db->get('rooms')->result_array() as $r_arr) {
            $rooms[$r_arr['id']] = $r_arr['name'];
        }

        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $output = [];
        $records = [];
        $booked = [];
        $data = [];
        $onService = [];
        $durationArray = getDurationArray();
        $datas = $this->db->get_where('service_order_detail', ['date' => $now])->result_array();

        foreach ($datas as $dt) {

            $booked[$dt['room_id']][$dt['time']] = $dt['duration'];
            $onService[$dt['worker_id']] = [1 => strtotime($now . ' ' . $dt['time']), 2 => strtotime($now . ' ' . $dt['time']) + ($dt['duration'] * 60)];
        }
        
        foreach ($rooms as $key => $value) {
            if (isset($booked[$key])) {
                $data[$key] = $booked[$key];
            } else {
                $data[$key] = [];
            }
        }

        // if ($therapis_id > 999) {
        //     return $this->randomizeR($open, $data, $duration, $cooldown, $close, $onService, $service_id, $therapis_id);
        // }

        foreach ($data as $room => $times) {
            $startTime = $open;
            $timeIndex = 1;
            $endIndex = count($times);

            if ($endIndex == 0) {
                // echo "if zero $endIndex, $room\n";
                $this->roomLoop($duration, $cooldown, $startTime, $close, $room, $onService, $therapis_id);
            }
            foreach ($times as $time => $dr) {

                $bookedTime = strtotime($now . ' ' . $time);
                $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                if ($timeIndex == $endIndex) {
                    // echo "if end $endIndex, $room\n";
                    $this->roomLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $therapis_id);
                    $startTime = $open;
                    $timeIndex = 0;
                } else {
                    // echo "if $endIndex, $room\n";
                    $this->roomLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $therapis_id);
                    $startTime = $endBook;
                    $timeIndex ++;
                }
            }
        }
        sort($this->timeResult);

        if (isset($this->roomResult[$time_selected])) {
            if ($int) {
                return true;
            }
            foreach ($this->roomResult[$time_selected] as $value) {
                $output['results'][] = ['id' => $value, 'text' => $value];
            }
        }

        echo json_encode($output , JSON_PRETTY_PRINT);
    }

    private function roomLoop($d, $cd, $ft, $lt, $r, $s, $t)
    {
        $target = ($d * 60) + $cd + $ft;

        if ($target < $lt) {
            $inService = false;
            if (isset($s[$t])) {
                $inService = true;
                // echo "$d $inService, $target >=".$s[$t][1]." && $target <= ".$s[$t][2]. " = ".($target >= $s[$t][1] && $target <= $s[$t][2])."\n";
            }
            if ($inService && ($target >= $s[$t][1] && $target <= ($s[$t][2] + $cd))) {
                $this->roomLoop($d, $cd, ($s[$t][2] + $cd), $lt, $r, $s, $t);
            } else {
                if (!in_array(date('H:i', $ft), $this->timeResult)) {
                    $this->timeResult[] = date('H:i', $ft);
                }

                if (!isset($this->roomResult[date('H:i', $ft)])) {
                    $this->roomResult[date('H:i', $ft)][] = $r;
                }
                elseif (!in_array($r, $this->roomResult[date('H:i', $ft)])) {
                    $this->roomResult[date('H:i', $ft)][] = $r;
                }
                
                $this->roomLoop($d, $cd, $target, $lt, $r, $s, $t);
            }
        }
    }

    private function randomizeT($open, $data, $duration, $cooldown, $close, $onService, $id, $therapis_id)
    {

        $genders = [];

        if ($therapis_id == 1000) {
            $query = "SELECT
                      workers.id,
                      workers.name,
                      workers.gender
                    FROM worker_services
                      INNER JOIN workers
                        ON worker_services.worker_id = workers.id
                    WHERE worker_services.service_id = '$id'
                    AND workers.gender = 'L'";
        } else {
            $query = "SELECT
                      workers.id,
                      workers.name,
                      workers.gender
                    FROM worker_services
                      INNER JOIN workers
                        ON worker_services.worker_id = workers.id
                    WHERE worker_services.service_id = '$id'
                    AND workers.gender = 'P'";
        }

        $therapis = $this->db->query($query)->result();
        $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
        $now = date('Y/m/d', strtotime($date));
        $dayStart = strtotime($now . ' 00:00:00');
        $output = [];
        foreach ($data as $room => $times) {
            $startTime = $open;
            $timeIndex = 1;
            $endIndex = count($times);
            if (isset($_GET['time'])) {
                $tt = addslashes($_GET['time']);
                $targetTime = strtotime($now . ' ' . $tt);
                foreach ($therapis as $t) {
                    $output['therapis'][] = $t->id;
                    if ($endIndex == 0) {
                        $this->singleTime($duration, $cooldown, $targetTime, $close, $room, $onService, $t->id);
                    }
                    foreach ($times as $time => $dr) {

                        $bookedTime = strtotime($now . ' ' . $time);
                        $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                        if ($timeIndex == $endIndex) {
                            $this->singleTime($duration, $cooldown, $targetTime, $bookedTime, $room, $onService, $t->id);
                            $startTime = $open;
                            $timeIndex = 0;
                        } else {
                            $this->singleTime($duration, $cooldown, $targetTime, $bookedTime, $room, $onService, $t->id);
                            $startTime = $endBook;
                            $timeIndex ++;
                        }
                    } 
                }
            } else {
                foreach ($therapis as $t) {
                    $output['therapis'][] = $t->id;
                    if ($endIndex == 0) {
                        $this->timeLoop($duration, $cooldown, $startTime, $close, $room, $onService, $t->id);
                    }
                    foreach ($times as $time => $dr) {

                        $bookedTime = strtotime($now . ' ' . $time);
                        $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                        if ($timeIndex == $endIndex) {
                            $this->timeLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $t->id);
                            $startTime = $open;
                            $timeIndex = 0;
                        } else {
                            $this->timeLoop($duration, $cooldown, $startTime, $bookedTime, $room, $onService, $t->id);
                            $startTime = $endBook;
                            $timeIndex ++;
                        }
                    }
                }
            }
        }

        $arr = array_rand($output['therapis']);
        $output['therapis'] = $output['therapis'][$arr];
        sort($this->timeResult);

        foreach ($this->timeResult as $value) {
            $output['data']['results'][] = ['id' => $value, 'text' => $value];
        }

        echo json_encode($output , JSON_PRETTY_PRINT);
    }

    private function singleTime($d, $cd, $ft, $lt, $r, $s, $t)
    {
        $target = ($d * 60) + $cd + $ft;
        if ($target < $lt) {
            $inService = false;

            if (isset($s[$t])) {
                $inService = true;
            }

            if ($inService && ($target >= $s[$t][1] && $target <= ($s[$t][2] + $cd))) {
                $this->singleTime($d, $cd, ($s[$t][2] + $cd), $lt, $r, $s, $t);
            } else {
                if (!in_array(date('H:i', $ft), $this->timeResult)) {
                    $this->timeResult[] = date('H:i', $ft);
                    $this->singleTime($d, $cd, $target, $lt, $r, $s, $t);
                }
            }
        }
    }

    private function timeLoop($d, $cd, $ft, $lt, $r, $s, $t)
    {
        $target = ($d * 60) + $cd + $ft;
        if ($target < $lt) {
            $inService = false;
            if (isset($s[$t])) {
                $inService = true;
            }
            if ($inService && ($target >= $s[$t][1] && $target <= ($s[$t][2] + $cd))) {
                $this->timeLoop($d, $cd, ($s[$t][2] + $cd), $lt, $r, $s, $t);
            } else {
                if (!in_array(date('H:i', $ft), $this->timeResult)) {
                    $this->timeResult[] = date('H:i', $ft);
                    $this->timeLoop($d, $cd, $target, $lt, $r, $s, $t);
                }
            }
        }
    }

    public function getTotalValue()
    {
        $service_id = (isset($_GET['input_service'])) ? addslashes($_GET['input_service']) : false;
        $duration = (isset($_GET['input_durasi'])) ? addslashes(getDurationValue($_GET['input_durasi'])) : false;
        $therapis_id = (isset($_GET['input_terapis'])) ? addslashes($_GET['input_terapis']) : false;
        $date = (isset($_GET['input_tanggal'])) ? addslashes($_GET['input_tanggal']) : 'now';
        $time = (isset($_GET['input_jam'])) ? addslashes($_GET['input_jam']) : false;
        $room_id = (isset($_GET['input_kamar'])) ? addslashes($_GET['input_kamar']) : false;

        $service = $this->db->get_where('services', ['id' => $service_id])->row_array();
        $therapis = $this->db->get_where('workers', ['id' => $therapis_id])->row_array();
        $room = $this->db->get_where('rooms', ['id' => $room_id])->row_array();
        $total = round(($service['price'] / 15) * $duration, -2);

        $data = [
            'service_name' => $service['name'],
            'therapis_name' => $therapis['name'],
            'room_name' => $room['name'],
            'date' => $date,
            'time' => $time,
            'duration' => $duration,
            'total_price' => number_format($total, 2, ',', '.')
        ];

        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function checkOutService()
    {
        $service_id = (isset($_POST['input_service'])) ? addslashes($_POST['input_service']) : false;
        $duration = (isset($_POST['input_durasi'])) ? addslashes(getDurationValue($_POST['input_durasi'])) : false;
        $therapis_id = (isset($_POST['input_terapis'])) ? addslashes($_POST['input_terapis']) : false;
        $date = (isset($_POST['input_tanggal'])) ? addslashes($_POST['input_tanggal']) : 'now';
        $time = (isset($_POST['input_jam'])) ? addslashes($_POST['input_jam']) : false;
        $room_id = (isset($_POST['input_kamar'])) ? addslashes($_POST['input_kamar']) : false;
        $name = (isset($_POST['name'])) ? addslashes($_POST['name']) : false;
        $phone = (isset($_POST['phone'])) ? addslashes($_POST['phone']) : false;
        $email = (isset($_POST['email'])) ? addslashes($_POST['email']) : false;

        if (!$service_id || !$duration || !$therapis_id || !$date || !$time || !$room_id || !$name || !$phone || !$email) {
            echo json_encode('Method is not allowed', JSON_PRETTY_PRINT);
            exit();
        }

        if (!$this->getAvailableRooms(true, $service_id, $duration, $therapis_id, $date, $time, $room_id, $name, $phone, $email)) {
            echo json_encode('Unavailable', JSON_PRETTY_PRINT);
            exit();
        }

        $result = $this->order->insertServiceOrder($service_id, $duration, $therapis_id, $date, $time, $room_id, $name, $phone, $email);

        if ($result) {
            echo json_encode(['status' => true, 'invoice' => $result->invoice_number], JSON_PRETTY_PRINT);
            return;
        }

        echo json_encode(['status' => false, 'data' => null], JSON_PRETTY_PRINT);
        return;
    }

    //Unused method

    private function getAvailableRoom()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes(getDurationValue($_GET['duration'])) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
        $time_selected = (isset($_GET['time'])) ? addslashes($_GET['time']) : false;
        $now = date('Y/m/d', strtotime($date));
        $rooms = [];
        foreach ($this->db->get('rooms')->result_array() as $r_arr) {
            $rooms[$r_arr['id']] = $r_arr['name'];
        }

        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $output = [];
        $records = [];
        $booked = [];
        $data = [];
        $working = [];
        $durationArray = getDurationArray();
        $datas = $this->db->get_where('service_order_detail', ['date' => $now])->result_array();

        foreach ($datas as $dt) {

            $booked[$dt['room_id']][$dt['time']] = $dt['duration'];
            $working[$dt['worker_id']] = $dt['time'] . ';' . $dt['duration'];
        }

        foreach ($rooms as $key => $value) {
            if (isset($booked[$key])) {
                $data[$key] = $booked[$key];
            } else {
                $data[$key] = [];
            }
        }

        foreach ($data as $room => $times) {
            $startTime = $open;
            $timeIndex = 1;
            $endIndex = count($times);

            if ($endIndex <= 0) {
                $this->roomLoop($duration, $cooldown, $startTime, $close, $room);
            }
            foreach ($times as $time => $dr) {

                $bookedTime = strtotime($now . ' ' . $time);
                $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                if ($timeIndex == $endIndex) {
                    $this->roomLoop($duration, $cooldown, $startTime, $close, $room);
                    $startTime = $open;
                    $timeIndex = 0;
                } else {
                    $this->roomLoop($duration, $cooldown, $startTime, $bookedTime, $room);
                    $startTime = $endBook;
                    $timeIndex ++;
                }
            }
        }
        sort($this->timeResult);

        if (isset($this->roomResult[$time_selected])) {
            foreach ($this->roomResult[$time_selected] as $value) {
                $output['results'][] = ['id' => $value, 'text' => $value];
            }
        }

        // echo json_encode($this->roomResult , JSON_PRETTY_PRINT);

        echo json_encode($this->roomResult , JSON_PRETTY_PRINT);
    }

    private function getAvailableTimes()
    {
        $service_id = (isset($_GET['service_id'])) ? addslashes($_GET['service_id']) : false;
        $duration = (isset($_GET['duration'])) ? addslashes(getDurationValue($_GET['duration'])) : false;
        $therapis_id = (isset($_GET['therapis_id'])) ? addslashes($_GET['therapis_id']) : false;
        $date = (isset($_GET['date'])) ? addslashes($_GET['date']) : 'now';
        $now = date('Y/m/d', strtotime($date));
        $rooms = [];
        foreach ($this->db->get('rooms')->result_array() as $r_arr) {
            $rooms[$r_arr['id']] = $r_arr['name'];
        }

        $dayStart = strtotime($now . ' 00:00:00');
        $open = strtotime($now . ' 10:00:00');
        $close = strtotime($now . ' 15:00:00');
        $cooldown = 20 * 60;
        $minimum = (25 * 60);
        $disableDate = [];
        $available = [];
        $output = [];
        $records = [];
        $booked = [];
        $data = [];
        $working = [];
        $durationArray = getDurationArray();
        $datas = $this->db->get_where('service_order_detail', ['date' => $now])->result_array();

        foreach ($datas as $dt) {

            $booked[$dt['room_id']][$dt['time']] = $dt['duration'];
            $working[$dt['worker_id']] = $dt['time'] . ';' . $dt['duration'];
        }

        foreach ($rooms as $key => $value) {
            if (isset($booked[$key])) {
                $data[$key] = $booked[$key];
            } else {
                $data[$key] = [];
            }
        }

        foreach ($data as $room => $times) {
            $startTime = $open;
            $timeIndex = 1;
            $endIndex = count($times);

            if ($endIndex <= 0) {
                $this->timeLoop($duration, $cooldown, $startTime, $close);
            }
            foreach ($times as $time => $dr) {

                $bookedTime = strtotime($now . ' ' . $time);
                $endBook = strtotime($now . ' ' . $time) + ($dr * 60) + $cooldown;

                if ($timeIndex == $endIndex) {
                    $this->timeLoop($duration, $cooldown, $startTime, $close);
                    $startTime = $open;
                    $timeIndex = 0;
                } else {
                    $this->timeLoop($duration, $cooldown, $startTime, $bookedTime);
                    $startTime = $endBook;
                    $timeIndex ++;
                }
            }
        }
        sort($this->timeResult);

        foreach ($this->timeResult as $value) {
            $output['results'][] = ['id' => $value, 'text' => $value];
        }

        echo json_encode($output , JSON_PRETTY_PRINT);
    }

}

