<section id="footer" class="bg-dark pt-4 pb-4 text-center text-white">

	&copy; <?php echo date('Y'); ?> osclasscommunity.com 

</section>

<script>

$('#dwld').click(function(){
	Swal.fire({
	type: 'success',
	title: 'Thank you for downloading!',
	html: 'Need a help? Ask your questions on<br><br><a target="_blank" href="http://forums.osclasscommunity.com/">Osclass community forum</a><br><br><br>',
	footer: '',
	showConfirmButton: false
	})
});
</script>


</body>

</html>
