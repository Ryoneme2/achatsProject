setTimeout(() => {
  const dropdown_container = document.querySelector(".dropdown-container");
  const dropdownClick = document.querySelector(".dropdownClick");

  // const body = document.getElementsByTagName("body")[0];

  dropdownClick.addEventListener("click", () => {
    if (dropdown_container.style.display == "block") {
      dropdown_container.style.display = "none";
    } else {
      dropdown_container.style.display = "block";
    }
  });

  // body.addEventListener("click", () => {
  //   dropdown_container.style.display = "none";
  // });
}, 500);
