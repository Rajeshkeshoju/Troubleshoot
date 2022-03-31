window.onload = function () {
	function openCode(event, file) {
		var e = document.getElementById("langSelect");
		var langSelected = e.value;

		if (langSelected == "C") {
			fileExtension = "c";
		}

		if (langSelected == "C++") {
			fileExtension = "cpp";
		}
	}

	var textarea = document.getElementById("textbox");
	if (textarea) {
		textarea.addEventListener("keydown", function (e) {
			if (e.key == "Tab") {
				e.preventDefault();
				var start = this.selectionStart;
				var end = this.selectionEnd;

				// set textarea value to: text before caret + tab + text after caret
				this.value =
					this.value.substring(0, start) + "\t" + this.value.substring(end);

				// put caret at right position again
				this.selectionStart = this.selectionEnd = start + 1;
			}
		});
	}

	function saveTextAsFile() {
		var textToWrite = document.getElementById("textbox").value;

		if (textToWrite == "") {
			alert("Need to code before run");
			return;
		}

		var e = document.getElementById("langSelect");
		var langSelected = e.value;

		if (langSelected == "C") {
			fileExtension = "c";
		}

		if (langSelected == "C++") {
			fileExtension = "cpp";
		}

		var textFileAsBlob = new Blob([textToWrite], { type: "text/plain" });
		var fileNameToSaveAs = "code." + fileExtension;

		var downloadLink = document.createElement("a");

		downloadLink.download = fileNameToSaveAs;
		downloadLink.innerHTML = "Download File";
		if (window.webkitURL != null) {
			// Chrome allows the link to be clicked without actually adding it to the DOM.
			downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
		} else {
			// Firefox requires the link to be added to the DOM  it can be clicked.
			downloadLink.href = window.URL.cbeforereateObjectURL(textFileAsBlob);
			downloadLink.onclick = destroyClickedElement;
			downloadLink.style.display = "none";
			document.body.appendChild(downloadLink);
		}

		downloadLink.click();

		delete downloadLink;
	}

	document.getElementById("run").addEventListener("click", saveTextAsFile);

	function reload(id) {
		console.log("reloading...");

		ele = document.getElementById(id);
		var content = ele.innerHTML;

		ele.innerHTML = content;
	}
};
