<?php $pagename =  basename($_SERVER['PHP_SELF']); ?>
		<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Aur Seekho</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;India 
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								
								<?php /*?><li class="<?php if($pagename == 'dashboard.php'){echo 'active';}?>"><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li><?php */?>
                                
                                <li>
									<a href="#"><i class="icon-user"></i> <span>User Manage</span></a>
									<ul>
										<li class="<?php if($pagename == 'user_list.php'){echo 'active';}?>"><a href="user_list.php">User List</a></li>
                                        <li class="<?php if($pagename == 'user_add.php' || $pagename == 'user_edit.php'){echo 'active';}?>"><a href="user_add.php">Add User</a></li>
									</ul>
								</li>
                                
                                <li class="<?php if($pagename == 'recent_watch.php'){echo 'active';}?>"><a href="recent_watch.php"><i class="icon-list"></i> <span>Recent  Watch Video </span></a></li>
                                
								<!-- /page kits -->

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->