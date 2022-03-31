
<?php

	function executeCode() {
		// $langSelected = $_POST('langSelect');
		// echo "langSelected";

		$codeFile = "code.c";
		$exeFile = "a.exe";
		$output = exec("gcc code.c & a > output.txt");

		$outputFile = "output.txt";
		if(file_exists($outputFile)) {

			$output = file($outputFile, FILE_IGNORE_NEW_LINES);
			
			foreach($output as $o) {
				echo '<script>';
				echo 'window.addEventListener("load", function () {  const para = document.createElement("p"); const line = document.createTextNode("'.$o.'"); para.appendChild(line); document.getElementById("output-container").appendChild(para)})';
				echo '</script>';
			}

			$file = null;

			unlink($outputFile);
		}

		if(file_exists($codeFile)) {
			copy($codeFile, "temp.c");
			unlink($codeFile);
		}

		if(file_exists($exeFile)) {
			unlink($exeFile);
		}

	}

	if(array_key_exists('run', $_POST)) {
		executeCode();
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Troubleshoot - Quest 2022</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" media="screen" href="./css/styles.css" />
		<script src="./js/main.js"></script>
	</head>
	
	<body>
		
		<div class="header row">
			<div class="col logo">
				<img src="./assets/images/jntuh-logo.png" />
			</div>
			<div class="col">
				<h2>TROUBLESHOOT - QUEST 2022</h1>
				<h3>Department of Computer Science & Engineering</h3>
				<h3>JNTUH University College of Engineering Hyderabad (Autonomous)</h3>
			</div>

			<div class="col logo">
				<img src="./assets/images/quest-logo.png" />
			</div>
		</div>

		<hr/>

		<div class="row">
			<div class="col">
				<label for="langSelect">Choose language : </label>
				<form method="post">
					<select name="langSelect" id="langSelect">
						<option selected>C</option>
						<option>C++</option>
					</select>
				</form>
			</div>

			<!-- <div class="col">
				<div class="tab">
					<button class="tablinks" onclick="openCode(event, 'code1')">Problem 1</button>
					<button class="tablinks" onclick="openCode(event, 'code2')">Problem 2</button>
				</div>
			</div> -->
			<div class="col">
				<form method="post">
				<button class="button runButton" id="run" name="run">Run</button>
				</form>
			</div>
		</div>

		<div class="parentContainer row">
			<div class="col">
				<textarea
					id="textbox"
					class="code-editor"
					placeholder="Code Here..."
				>
				<?php
					if(file_exists("temp.c")) {
						echo file_get_contents("temp.c");
					}
				?>
			</textarea>
			</div>

			<div class="col output-container" id="output-container">
				<b>Output<b>
			</div>
			
		</div>
	</body>
</html>
