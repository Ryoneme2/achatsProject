var allImg = [];
var classNameImg = [];
var allColorList = [];

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

const color = document.querySelector(".color");
const classListColorDiv = [
  "listed-color",
  "border",
  "border-1",
  "px-2",
  "py-1",
];

color.addEventListener("keydown", (event) => {
  // <input type="file" name="prod_photo" id="file" class="uploadButton" onchange="encodeImageFileAsURL()" />
  // <div id="preview" class="d-flex justify-content-center align-items-center"></div>
  const row = document.querySelector(".row-img");
  const col4 = document.createElement("div");
  const mb2 = document.createElement("div");
  const bDiv = document.createElement("div");
  const label = document.createElement("label");
  const inputFile = document.createElement("input");
  const preview = document.createElement("div");

  col4.classList.add("col-4");
  mb2.classList.add("mb-2");
  label.classList.add("uploadLabel");
  label.innerHTML = "choose";

  inputFile.setAttribute("type", "file");
  inputFile.setAttribute("name", "prod_photo");
  inputFile.setAttribute("id", "file");
  inputFile.setAttribute("class", "uploadButton");
  inputFile.setAttribute("onchange", "encodeImageFileAsURL()");

  preview.classList.add(
    "d-flex",
    "justify-content-center",
    "align-items-center"
  );
  preview.setAttribute("id", "preview");

  if (event.keyCode === 13) {
    const cvalue = color.value;
    const colorList = document.querySelector(".list-color");

    const div = document.createElement("div");
    classListColorDiv.map((className) => {
      div.classList.add(className);
    });

    div.innerHTML = `<span class="text-center">${cvalue}</span>`;
    colorList.appendChild(div);
    allColorList.push(color.value);
    label.appendChild(inputFile);
    mb2.appendChild(label);
    preview.innerHTML = cvalue;
    bDiv.appendChild(preview);
    col4.appendChild(mb2);
    col4.appendChild(bDiv);
    row.appendChild(col4);
    color.value = "";
  }
});
