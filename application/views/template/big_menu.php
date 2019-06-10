<div class="row">
	<?php 
		foreach ($menus as $menu) { 
			if(can($menu['method'].'-'.$menu['class'])){
				?>
			
	    <div class="col-xl-3 col-md-6">
	    	<a href="<?= base_url($menu['uri']); ?>">
			    <div class="card o-hidden bg-c-blue">
			    	<div class="icon" style="position: absolute; height: 100%; display: flex;justify-content: center; align-items: center; right: 0;">
		            	<i class="<?= $menu['icon'];?>" style="font-size: 100px; color: rgba(255,255,255,0.3);"></i>
		            </div> 
			        <div class="card-block text-white">
			            <h5 class="m-t-15"><?= $menu['name']; ?></h5>
			            <span><?= $menu['description']; ?></span>
			        </div>
			    </div>
		    </a>
		</div>
	<?php	
			}
		}
	?>
</div>