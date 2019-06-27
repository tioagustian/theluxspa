<?php
/**
 * @author: Tio Agustian <tio.agustian94@gmail.com>
 * Website: https://tioagustian.me
 *
 * Copyright (c) 2019 Tio Agustian
 * Released under the MIT license
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model
{

    public function insertServiceOrder($service_id, $duration, $therapis_id, $date, $time, $room_id, $name, $phone, $email)
    {
        $invoice_id = $this->createInvoiceID();
        $order_detail_id = $this->createServiceOrderID($service_id, $duration, $therapis_id, $date, $time, $room_id);
        $date = date('Y/m/d', strtotime($date));
        $time = date('H:i:s', strtotime($time));
        $currentDate = date('Y/m/d H:i:s', strtotime('now'));
        $expiry = date('Y/m/d H:i:s', strtotime('+6 hours'));
        $service = $this->db->get_where('services', ['id'=>$service_id])->row_array();
        $price = $service['price'];
        $total = round(($service['price'] / 15) * $duration, -2);
        $data_invoice = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'voucher_number' => $invoice_id,
            'status' => 'unpaid',
            'method' => 'online',
            'expiry' => $expiry,
            'created_at' => $currentDate
        ];

        $insert_invoice = $this->db->insert('invoices', $data_invoice);
        
        if ($insert_invoice) {

            $inv_id = $this->db->insert_id();
            $data_service_order = [
                'invoice_id' => $inv_id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'created_at' => $currentDate
            ];

            $insert_order = $this->db->insert('service_orders', $data_service_order);

            if ($insert_order) {

                $ord_id = $this->db->insert_id();
                $data_order_detail = [
                    'order_id' => $ord_id,
                    'name' => $name,
                    'order_id' => $ord_id,
                    'service_id' => $service_id,
                    'worker_id' => $therapis_id,
                    'room_id' => $room_id,
                    'duration' => $duration,
                    'total' => $total,
                    'date' => $date,
                    'time' => $time,
                    'code' => $order_detail_id,
                    'status' => 'pending_payment'
                ];

                $insert_order_detail = $this->db->insert('service_order_detail', $data_order_detail);

                if ($insert_order_detail) {

                    $result = $this->db->get_where('invoices', ['id' => $inv_id])->row();

                    return $result;

                } else {
                    $this->db->delete('invoices', ['id' => $inv_id]);
                    $this->db->delete('service_orders', ['id' => $ord_id]);
                }

            } else {
                $this->db->delete('invoices', ['id' => $inv_id]);
            }
        }

        return false;
    }

    public function getServiceOrder($invoice)
    {

        $inv_sql = $this->db->get_where('invoices', ['voucher_number' => $invoice]);
        if (!$inv_sql->num_rows()) {
            return [];
        }

        $result['invoice_detail'] = $inv_sql->row();

        $sql = "SELECT
                  invoices.name,
                  invoices.email,
                  invoices.phone,
                  invoices.voucher_number,
                  invoices.status,
                  invoices.method,
                  invoices.expiry,
                  invoices.created_at,
                  services.name AS service,
                  services.price,
                  service_order_detail.total,
                  workers.name AS therapis,
                  rooms.name AS room,
                  service_order_detail.duration,
                  service_order_detail.total,
                  service_order_detail.date,
                  service_order_detail.time,
                  service_order_detail.code,
                  service_order_detail.name AS _name
                FROM service_orders
                  INNER JOIN invoices
                    ON service_orders.invoice_id = invoices.id
                  INNER JOIN service_order_detail
                    ON service_order_detail.order_id = service_orders.id
                  INNER JOIN services
                    ON service_order_detail.service_id = services.id
                  INNER JOIN workers
                    ON service_order_detail.worker_id = workers.id
                  INNER JOIN rooms
                    ON service_order_detail.room_id = rooms.id
                WHERE invoices.voucher_number = '$invoice'";

        $result['orders'] = $this->db->query($sql)->row();

        return $result;
    }

    private function createInvoiceID()
    {
        $prefix = 'LUX-TEST';
        $date = date('Ymd', strtotime('now'));
        $beginOfDay = date('Y/m/d H:i:s',strtotime("midnight", strtotime('now')));
        $endOfDay   = date('Y/m/d H:i:s', strtotime("tomorrow", strtotime("midnight", strtotime('now'))) - 1);
        $row = $this->db->query("SELECT * FROM invoices WHERE created_at BETWEEN '$beginOfDay' AND '$endOfDay'")->num_rows() + 1;
        $records = $this->numberFormat($row, 3);
        // die($this->db->last_query());
        return $prefix . $date . $records;
    }

    private function createServiceOrderID($_service, $duration, $_therapis, $_date, $_time, $_room)
    {
        $prefix = 'LUX-';
        $service = $this->numberFormat($_service);
        $therapis = $this->numberFormat($_therapis);
        $room = $this->numberFormat($_room);
        $dateTime = date('YmdHi', strtotime($_date . ' ' . $_time));

        return $prefix . $service . $therapis . $room . $dateTime;
    }

    private function numberFormat($value='', $prefix = 2)
    {
        if ($prefix == 3) {
            if ($value < 100) {
                return '0' . $value;
            }
            if ($value < 10) {
                return '00' . $value;
            }
            return $value;
        } else {
            if ($value < 10) {
                return '0' . $value;
            }
            return $value;
        }
    }
}
