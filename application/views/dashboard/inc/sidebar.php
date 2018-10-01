 <!-- sidebar-->
<aside class="aside">
 <!-- START Sidebar (left)-->
	<div class="aside-inner">
		<nav data-sidebar-anyclick-close="" class="sidebar">
		   <!-- START sidebar nav-->
			<ul class="nav">
				<li class="nav-heading ">
					<span data-localize="sidebar.heading.HEADER">Main Navigation</span>
				</li>                 
				<li class="<?php echo ($this->subMenu == 1) ? " active" : " "; ?>" title="User">
					<a href="<?php echo DASHURL."/user"; ?>">
						<em class="fa icon-people"></em>
						<span data-localize="">User</span>
					</a>
				</li>   

				<!-- <li class="<?php echo ($this->subMenu == 2) ? " active" : " "; ?>" title="Organizer">
					<a href="<?php echo DASHURL."/organizer"; ?>">
						<em class="fa fa-group (alias)"></em>
						<span data-localize="">Organizer</span>
					</a>
				</li>  -->
					<li class="<?php echo ($this->subMenu == 5) ? " active" : " "; ?>" title="Flyer">
					<a href="<?php echo DASHURL."/Flyer"; ?>">
						<em class="fa fa-file-picture-o"></em>
						<span data-localize="">Flyer</span>
					</a>
				</li>   
				
				<li class="<?php echo ($this->subMenu == 4) ? " active" : " "; ?>" title="Funcies">
					<a href="<?php echo DASHURL."/funcies"; ?>">
						<em class="icon-magic-wand"></em>
						<span data-localize="">Funcies</span>
					</a>
				</li>    

				<!-- <li class="<?php echo ($this->subMenu == 3) ? " active" : " "; ?>" title="Faq">
					<a href="<?php echo DASHURL."/faq"; ?>">
						<em class="fa fa-question-circle"></em>
						<span data-localize="">Faq</span>
					</a>
				</li> --> 
				<li class="<?php echo ($this->subMenu == 6) ? " active" : " "; ?>" title="Faq">
					<a href="<?php echo DASHURL."/questions"; ?>">
						<em class="fa fa-question-circle"></em>
						<span data-localize="">FAQ </span>
					</a>
				</li> 


			           
				<!--<li class=" ">
					<a href="#area" title="Area" data-toggle="collapse">
						<em class="fa fa-newspaper-o"></em>
						<span data-localize="sidebar.nav.area">Areas</span>
					</a>
					<ul id="area" class="nav sidebar-subnav collapse <?php echo ($this->menu == 1) ? " in" : " "; ?>">
					  <li class="<?php echo ($this->subMenu == 5) ? " active" : " "; ?>">
						   <a href="<?php echo DASHURL."/areas/listing/state"; ?>">
							  <span>Add News </span>
						   </a>
						</li>
						<li class="<?php echo ($this->subMenu == 6 ) ? " active" : " "; ?>">
						   <a href="<?php echo DASHURL."/area/listing/state"; ?>">
							  <span>Area Listing</span>
						   </a>
						</li>
					</ul>
				</li>-->
			</ul>
			<!-- END sidebar nav-->
		</nav>
	</div>
 <!-- END Sidebar (left)-->
</aside>
