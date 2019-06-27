
		var countdown = setInterval(function () {
			var deadline = new Date('<?= $expired_in ?>').getTime()
			var now = new Date().getTime();
			var t = deadline - now; 
			var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
			var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
			if (hours < 10) {
				hours = '0' + hours
			}
			var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
			if (minutes < 10) {
				minutes = '0' + minutes
			}
			var seconds = Math.floor((t % (1000 * 60)) / 1000);
			if (seconds < 10) {
				seconds = '0' + seconds
			}
			var ms = Math.floor((t % (1000 * 60)) / 10).toString()
			var el = document.getElementById('countdown')
			el.innerHTML = '(' + hours + ':' + minutes + ':' + seconds + ':' + ms.slice(-2) +')'
			if (t < 0) {
				e.style = 'color: red;'
				el.innerHTML = '(EXPIRED)'
			}
		}, 10)

		$(document).ready(function() 
		{
			if (window.pageYOffset != 0)
			{
				$(".cs-navbar").addClass("cs-navbar-shadow");
			}

			$(window).scroll(function() 
			{
				if ($(window).scrollTop() == 0) 
				{
					$(".cs-navbar").removeClass("cs-navbar-shadow");
				}
				else 
				{
					$(".cs-navbar").addClass("cs-navbar-shadow");
				}
			});

			$('#pay').click(function (event) {
			    event.preventDefault();
			    $(this).attr("disabled", "disabled");
		    
		    	$.ajax({
			      	url: "<?= base_url()?>payment/token/<?= $invoice_id?>",
			      	cache: false,
			      	success: function(data) {
			        
				        var resultType = document.getElementById('result-type')
				        var resultData = document.getElementById('result-data')

				        function changeResult(type,data){
				          	$.ajax({
				          		url: "<?= base_url('payment/update/'.$invoice_id)?>",
				          		cache: false,
				          		data: data,
				          		method: 'post',
				          		success: function (response) {
				          			console.log(response)
				          		}
				          	})
				        }

				        snap.pay(data, {
				          
				          	onSuccess: function(result){
				            	changeResult('success', result)
				            	console.log(result)
				            	window.location = result.finish_redirect_url
				          	},
				          	onPending: function(result){
				            	changeResult('pending', result)
				            	console.log(result)
				            	window.location = result.finish_redirect_url
				          	},
				          	onError: function(result){
				            	changeResult('error', result)
				            	console.log(result)
				          	}
				        });
			      	},
			      	error: function (error) {
			      		snap.hide()
			      	}
		    	});
		  	});
		});