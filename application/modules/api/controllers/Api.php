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
        $this->load->helper('url');
    }

    public function index()
    {
        return ;
    }

    public function getAvailableServices($id = false)
    {
        $query = $this->db->get('services');
        foreach ($query->result() as $row) {
            $data['results'][] = ["id" => $row->id, "text" => $row->name];
        }
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function getAvailableTherapis()
    {
        $service = (addslashes(isset($_GET['service_id']))) ? $_GET['service_id'] : false;
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

}

