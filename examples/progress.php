<div class="example-header">Progress Bars</div>

<div class="example">
	<div class="progress">
		<div class="progress-bar" style="width: 80%">80%</div>
	</div>

	<div class="progress">
		<div class="progress-bar info" style="width: 65%">65%</div>
	</div>

	<div class="progress">
		<div class="progress-bar error" style="width: 5%">5%</div>
	</div>

	<div class="progress">
		<div class="progress-bar warning" style="width: 25%">25%</div>
	</div>

	<div class="progress">
		<div class="progress-bar success" style="width: 95%">95%</div>
	</div>

	<div class="progress">
		<div class="progress-bar" style="width: 100%">100%</div>
	</div>

	<div class="progress">
		<div class="progress-bar warning" style="width: 25%">25%</div>
		<div class="progress-bar error" style="width: 65%">65%</div>
		<div class="progress-bar info" style="width: 5%">5%</div>
	</div>

	<div class="progress">
		<div class="progress-bar" style="width: 0%">0%</div>
	</div>

	<p>Will automatically animate between widths and states.</p>

	<div class="progress">
		<div class="progress-bar" id="bar" style="width: 0%">0%</div>
	</div>
</div>

<script type="text/javascript">
	window.addEvent('domready', function() {
		setInterval(function() {
			var rand = Math.floor(Math.random() * 100),
				state;

			if (rand > 85) {
				state = 'success';
			} else if (rand > 50) {
				state = 'info';
			} else if (rand > 20) {
				state = 'warning';
			} else {
				state = 'error';
			}

			$('bar')
				.setStyle('width', rand + '%')
				.set('text', rand + '%')
				.set('class', 'progress-bar ' + state);
		}, 3000);
	});
</script>