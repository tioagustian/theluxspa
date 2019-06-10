<div class="row">
	<?php 
		foreach ($menus as $menu) {
			if ($menu['submenus']['length'] > 0 && can($menu['permission'])) {
	?>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5><?= $menu['name'];?></h5>
                <span><?= $menu['description'];?></span>
            </div>
            <div class="card-block">
            	<div class="row">
	                <?php 
					foreach ($menu['submenus'] as $submenu) { 
						if(can($submenu['method'].'-'.$submenu['class'])){
							?>
						
				    <div class="col-xl-6 col-md-6">
				    	<a href="<?= base_url($submenu['uri']); ?>">
						    <div class="card o-hidden bg-c-blue">
						    	<div class="icon" style="position: absolute; height: 100%; display: flex;justify-content: center; align-items: center; right: 0;">
					            	<i class="<?= $submenu['icon'];?>" style="font-size: 100px; color: rgba(255,255,255,0.3);"></i>
					            </div> 
						        <div class="card-block text-white">
						            <h5 class="m-t-15"><?= $submenu['name']; ?></h5>
						            <span><?= $submenu['description']; ?></span>
						        </div>
						    </div>
					    </a>
					</div>
				<?php	
						}
					}
				?>
				</div>
            </div>
        </div>
    </div>
	<?php 
			}
		} ?>
</div>