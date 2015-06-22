<?php if (!$notes): ?>
	<P>You have not created any notes.</P>
<?php endif; ?>

<?php foreach ($notes as $note): ?>

	<article class='note'>
		<ul align="right"><a href="notes/edit/<?php echo $note->id ?>">Edit</a></ul>
		
		<h2>
			<a href="/notes/<?php echo $note->id; ?>"><?php echo $note->title; ?></a>
		</h2>

		<p>
			<?php echo $note->body; ?>
		</p>
	</article>
	
<?php endforeach; ?>