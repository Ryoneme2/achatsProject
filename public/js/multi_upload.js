var allImg = [];

function encodeImageFileAsURL() {
  const filesSelected = document.getElementById("file").files;
  if (filesSelected.length > 0) {
    const fileToLoad = Array.from(filesSelected).map((file) => {
      const fileReader = new FileReader();

      fileReader.onload = function (fileLoadedEvent) {
        const srcData = fileLoadedEvent.target.result; // <--- data: base64

        allImg.push(srcData);
        // allImg.push("-");

        const newImage = document.createElement("img");
        newImage.src = srcData;

        document.getElementById("preview").appendChild(newImage);
      };
      fileReader.readAsDataURL(file);
    });
    console.log(allImg);
  }
}

// const sendPayload = async () => {
//   const payload = allImg.join("-");
//   const xhr = new XMLHttpRequest();
//   xhr.open("POST", "../service/testService.php");
//   xhr.setRequestHeader("Content-Type", "application/json");
//   // xhr.onload = function () {
//   //   console.log(xhr.responseText);
//   // };
//   xhr.send(
//     JSON.stringify({
//       payload,
//     })
//   );
// };
