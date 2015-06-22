<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "read_all" ); ?>'><?php echo Html::anchor('notes/read_all','Read all');?></li>
	<li class='<?php echo Arr::get($subnav, "read_one" ); ?>'><?php echo Html::anchor('notes/read_one','Read one');?></li>
	<li class='<?php echo Arr::get($subnav, "create" ); ?>'><?php echo Html::anchor('notes/create','Create');?></li>
	<li class='<?php echo Arr::get($subnav, "update" ); ?>'><?php echo Html::anchor('notes/update','Update');?></li>
	<li class='<?php echo Arr::get($subnav, "delete" ); ?>'><?php echo Html::anchor('notes/delete','Delete');?></li>
</ul>

<p>Delete</p>