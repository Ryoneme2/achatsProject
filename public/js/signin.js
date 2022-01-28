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
