var index = 0;

const displayImg = (imgElem, newIndex) => {
  console.log(imgElem);
  console.log(newIndex);
  if (newIndex < 0) {
    newIndex = imgElem.length - 1;
  }
  if (newIndex > imgElem.length - 1) {
    newIndex = 0;
  }
  imgElem.forEach((element) => {
    element.classList.remove("active");
  });
  const newImage = imgElem[newIndex];
  newImage.classList.add("active");

  index = newIndex;
};

const img = document.querySelectorAll(".image-product-tmp");
const img_tmp = document.querySelector(".image-product-tmp-tmp");
const next = document.querySelector(".next");
const prev = document.querySelector(".prev");

prev.addEventListener("click", () => {
  img_tmp.classList.remove("active");
  displayImg(img, index - 1);
});
next.addEventListener("click", () => {
  img_tmp.classList.remove("active");
  displayImg(img, index + 1);
});
