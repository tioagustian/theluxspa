<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-9LQFGZYlC0TCqIqtUWEXLJpb', 'production' => false);
		$this->load->library('midtrans');
		$this->load->model('order');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function token($invoice = '')
    {

    	if (!$invoice) {
    		return;
    	}

    	$data = $this->order->getServiceOrder($invoice);

    	if (count($data) == 0) {
    		echo json_encode('invalid');
    		return;
    	}
		// Required
		$transaction_details = array(
		  'order_id' => $invoice,
		  'gross_amount' => $data['orders']->total, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => $data['orders']->code,
		  'price' => $data['orders']->total,
		  'quantity' => '1',
		  'name' => $data['orders']->service.' x '.$data['orders']->duration . 'menit'
		);

		// Optional
		$item_details = array ($item1_details);


		// Optional
		$customer_details = array(
		  'first_name'    => $data['invoice_detail']->name,
		  'email'         => $data['invoice_detail']->email,
		  'phone'         => $data['invoice_detail']->phone
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $expiry = round((strtotime($data['invoice_detail']->expiry) - $time) / 60);

        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute', 
            'duration'  => $expiry
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function update($id)
    {
    	$trx_id = $this->input->post('transaction_id');
    	if (isset($trx_id)) {
    		$this->db->where('voucher_number', $id);
			$this->db->update('invoices', ['transaction_id' => $trx_id]);
    	}
    	var_dump([$trx_id, $this->db->last_query()]);
    }

    public function finish(){
         $order_id = $this->input->get('order_id');
         $data['order_id'] = $order_id;
         $this->load->view('finish', $data);

    }

    public function notificationHandler()
    {
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result);

		if(!is_null($result)){
			// $notif = $this->veritrans->status($result->order_id);
			$invoice = $this->db->get_where('invoices', ['voucher_number' => $result->order_id])->row();
			if ($invoice->transaction_id != $result->transaction_id) {
				log_message('error', 'transaction_id not match');
				return;
			}
			$status_code = $result->status_code;
			$inv['status'] = 'pending';
			$srv['status'] = 'pending_payment';

			switch ($status_code) {
				case '200':
					$inv['status'] = 'settlement';
					$srv['status'] = 'await';
					break;

				case '202':
					$inv['status'] = 'denied';
					$srv['status'] = 'canceled';
					break;
				
				default:
					$inv['status'] = 'pending';
					$srv['status'] = 'pending_payment';
					break;
			}

			$this->db->where('voucher_number', $result->order_id);
			$this->db->update('invoices', $inv);
			log_message('info','invoice update: ' . $this->db->last_query());

			$query = "SELECT
					  service_order_detail.id
					FROM service_orders
					  INNER JOIN invoices
					    ON service_orders.invoice_id = invoices.id
					  INNER JOIN service_order_detail
					    ON service_order_detail.order_id = service_orders.id
					WHERE invoices.voucher_number = '$result->order_id'";

			$sOrd = $this->db->query($query)->row();
			log_message('debug','get order: ' . $this->db->last_query());
			$this->db->where('id', $sOrd->id);
			$this->db->update('service_order_detail', $srv);
			log_message('debug','order update: ' . $this->db->last_query());
		}
		log_message('debug','midtrans data: ' . $json_result);

		error_log(print_r($result,TRUE));
    }
}
