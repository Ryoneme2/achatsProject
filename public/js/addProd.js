var allImg = [];

const color = document.querySelector(".color");
const classListColorDiv = [
  "listed-color",
  "border",
  "border-1",
  "px-2",
  "py-1",
];

var i = 0;
var classNameImg = [];
var allColorList = [];
var colorValue = [];

color.addEventListener("keydown", (event) => {
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

  preview.classList.add(
    "d-flex",
    "justify-content-center",
    "align-items-center"
  );

  if (event.keyCode === 13) {
    inputFile.setAttribute("onchange", `encodeImageFileAsURLIndiv(${i})`);
    preview.setAttribute("id", `preview`);
    preview.classList.add(
      "d-flex",
      "justify-content-center",
      "align-items-center",
      `preview${i}`
    );
    classNameImg.push(`preview${i}`);

    const cvalue = color.value;
    const colorList = document.querySelector(".list-color");

    const div = document.createElement("div");
    classListColorDiv.map((className) => {
      div.classList.add(className);
    });

    div.innerHTML = `<span class="color-elem text-center">${cvalue}</span>`;
    colorList.appendChild(div);
    allColorList.push(color.value);
    label.appendChild(inputFile);
    mb2.appendChild(label);
    preview.innerHTML = cvalue;
    colorValue.push(cvalue);
    bDiv.appendChild(preview);
    col4.appendChild(mb2);
    col4.appendChild(bDiv);
    row.appendChild(col4);
    color.value = "";
    i++;
  }
});

function encodeImageFileAsURLIndiv(id) {
  const filesSelected = document.querySelectorAll(".uploadButton")[id].files;

  // console.log(filesSelected);

  if (filesSelected.length > 0) {
    var fileToLoad = filesSelected[0];

    var fileReader = new FileReader();

    fileReader.onload = function (fileLoadedEvent) {
      var srcData = fileLoadedEvent.target.result; // <--- data: base64

      allImg.push(srcData);

      var newImage = document.createElement("img");
      newImage.classList.add("rounded");
      newImage.src = srcData;

      document.querySelector(`.preview${id}`).innerHTML = newImage.outerHTML;
    };
    fileReader.readAsDataURL(fileToLoad);
  }
}

const sendPayload = async () => {
  // input something incorrect please check
  const unValidateData = document.querySelectorAll(".input-text");
  const textArea = document.querySelector(".input-textarea");
  const validate_text = document.querySelector(".validate-text");
  const unValidateDataAll = [...Array.from(unValidateData), textArea];
  const dataPayload = [];
  let isValidate = true;

  unValidateDataAll.forEach((data) => {
    // console.log(data.value);
    if (data.value === "" || data.value === "Please select one") {
      validate_text.innerHTML = "";
      // return;
      isValidate = false;
    }

    dataPayload.push(data.value);
  });

  console.log(dataPayload);
  if (true) {
    const payload = {
      prod_name: dataPayload[0],
      prod_color: colorValue,
      prod_type: dataPayload[2],
      prod_size: dataPayload[3],
      prod_weight: dataPayload[4],
      prod_warrenty: dataPayload[5],
      prod_price: dataPayload[6],
      prod_detail: dataPayload[7],
      prod_img: allImg.join("-"),
    };

    console.log(payload);

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "http://localhost/achatsProject/service/addProductV2.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(payload));
  }
};
