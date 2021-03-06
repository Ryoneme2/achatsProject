function encodeImageFileAsURL() {
  var filesSelected = document.getElementById("file").files;
  if (filesSelected.length > 0) {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var srcData = fileLoadedEvent.target.result; // <--- data: base64

      var newImage = document.createElement("img");
      newImage.src = srcData;

      document.getElementById("preview").innerHTML = newImage.outerHTML;
    };
    fileReader.readAsDataURL(fileToLoad);
  }
}

function encodeImageFileAsURLTmp() {
  var filesSelected = document.getElementById("file").files;

  const tmpIng = document.getElementById("img-tmp");

  tmpIng.style.display == "none";
  if (filesSelected.length > 0) {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var srcData = fileLoadedEvent.target.result; // <--- data: base64

      var newImage = document.createElement("img");
      newImage.src = srcData;

      document.getElementById("preview").innerHTML = newImage.outerHTML;
    };
    fileReader.readAsDataURL(fileToLoad);
  }
}

function encodeImageFileAsURL2() {
  var filesSelected = document.getElementById("file2").files;
  if (filesSelected.length > 0) {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var srcData = fileLoadedEvent.target.result; // <--- data: base64

      var newImage = document.createElement("img");
      newImage.src = srcData;

      document.getElementById("preview2").innerHTML = newImage.outerHTML;
    };
    fileReader.readAsDataURL(fileToLoad);
  }
}

function encodeImageFileAsURLUpdate() {
  var filesSelected = document.getElementById("file").files;
  const existImg = document.getElementById("img-exist");

  if (filesSelected.length > 0) {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var srcData = fileLoadedEvent.target.result; // <--- data: base64

      existImg.src = srcData;
    };
    fileReader.readAsDataURL(fileToLoad);
  }
}
