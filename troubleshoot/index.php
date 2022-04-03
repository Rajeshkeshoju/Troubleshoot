<?php
	$lang = "C";

	if(!isset($_COOKIE['lang'])) {
		setcookie("lang", $lang, time()+3600);
	}

	function changeFile($file) {
		echo $file;
	}

	function executeCode($lang) {
		$codeFile = "code.c";
		$exeFile = "a.exe";
		
		if($lang == "C") {
			$output = exec("gcc code.c & a > output.txt");
		}
		
		if($lang == "C++") {
			$codeFile = "code.cpp";
			$output = exec("g++ code.cpp & a > output.txt");
		}

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
			$tempFile = "temp.";
			if($lang == "C") {
				$tempFile = $tempFile."c";
			}

			if($lang == "C++") {
				$tempFile = $tempFile."cpp";
			}
			copy($codeFile, $tempFile);
			unlink($codeFile);
		}

		if(file_exists($exeFile)) {
			unlink($exeFile);
		}

	}

	if(array_key_exists('run', $_POST)) {
		executeCode($_COOKIE['lang']);
	}

	if(array_key_exists('langSave', $_POST)) {
		setcookie('lang', $_POST['langSelect'], time()+3600);
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Troubleshoot - Quest '22</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="icon" type="image/x-icon" href="./assets/images/quest-logo.png">

		<link rel="stylesheet" type="text/css" media="screen" href="./css/styles.css" />

		
	</head>
	
	<body>
		
		<div class="header row">
			<div class="col logo">
				<img src="./assets/images/jntuh-logo.png" />
			</div>
			<div class="col">
				<h2>TROUBLESHOOT - QUEST '22</h1>
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
						<option value="C" <?php if($_COOKIE['lang'] == 'C') echo 'selected = "selected"' ?>>C</option>
						<option value="C++" <?php if($_COOKIE['lang'] == 'C++') echo 'selected = "selected"' ?>>C++</option>
					</select>

					<input type ="submit" id="langSave" name="langSave" value="Save"/>
				</form>
			</div>

			<div class="col">
				<div class="tab">
					<button class="tablinks" onclick="openCode(event, 'temp1')">Problem 1</button>
					<button class="tablinks" onclick="openCode(event, 'temp2')">Problem 2</button>
				</div>
			</div>
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
						if($_COOKIE['lang'] == "C" && file_exists("temp1.c")) {
							echo file_get_contents("temp1.c");
						}

						if($_COOKIE['lang'] == "C++" && file_exists("temp1.cpp")) {
							echo file_get_contents("temp1.cpp");
						}
					?>
				</textarea>
			</div>

			<div class="col output-container" id="output-container">
				<b>Output<b>
			</div>
			
		</div>

		
		<script src="./js/main.js"></script>
		<script>

			function openCode(event, file) {
				var e = document.getElementById("langSelect");
				var langSelected = e.value;
				var fileExtension = "C";

				if (langSelected == "C") {
					fileExtension = "c";
				}

				if (langSelected == "C++") {
					fileExtension = "cpp";
				}

				file += "." + fileExtension;
				console.log(file);
				

				document.cookie = "file = " + file;
				<?php
					$file= $_COOKIE['file'];
				?>

				document.getElementById('textbox').innerHTML = '<?php echo file_get_contents($file);?>';
			}

		</script>
	</body>
</html>
