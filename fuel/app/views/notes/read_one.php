<article class="note">
	<ul align="right"><a href="/notes/edit/<?php echo $note->id ?>">Edit</a></ul>
	<!-- <ul align="right"><a href="/notes/delete/<?php echo $note->id ?>">Delete</a></ul> -->
	
	<h2>
		<?php echo $note->title; ?>
	</h2>

	<p>
		<?php echo $note->body; ?>
	</p>
</article>