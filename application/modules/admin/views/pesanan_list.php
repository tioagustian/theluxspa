<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?= $so_list['title'];?></h5>
                <span><?= $so_list['description'];?></span>
            </div>
            <div class="card-block">
                <table id="list" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Order id</th>
                            <th>Name</th>
                            <th>Therapis</th>
                            <th>Service</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Invoice name</th>
                            <th>Invoice phone</th>
                            <th>Invoice number</th>
                            <th>Invoice status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#list').DataTable( {
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= $url['getDataPesanan']; ?>"
            },
            columns: [
                {data: "no"},
                {data: "order_id"},
                {data: "name"},
                {data: "therapis"},
                {data: "service"},
                {data: "room"},
                {data: "date"},
                {data: "time"},
                {data: "duration"},
                {data: "status"},
                {data: "invoice_name"},
                {data: "invoice_phone"},
                {data: "invoice_number"},
                {data: "invoice_status"},
                {data: "total"}
            ]
        })

    })
</script> 