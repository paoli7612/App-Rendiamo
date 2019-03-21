<div class="w3-right">
	<div class="w3-panel">
		<form onsubmit="filter()">
			<input type="text" class="w3-col radius-left w3-threequarter w3-input" id="ricerca"
			value="<?php if(isset($_GET['ricerca'])) echo $_GET['ricerca']; ?>">
			<button type="submit" class="w3-col radius-right w3-blue w3-button w3-quarter" onclick="filter()">
				<i class="fas fa-search"></i>
			</button>
		</form>
	</div>
</div>
