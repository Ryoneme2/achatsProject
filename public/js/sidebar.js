const menuBtn = document.querySelector(".menu-btn");
const sidebar = document.querySelector(".side-bar");
const itemsidebar = document.querySelectorAll(".item-sidebar");
const itemsidebarclose = document.querySelector(".item-sidebar-close");

const close = document.querySelector(".item-sidebar-close");

function ScrollToTarget(target) {
  document.getElementById(target).scrollIntoView(true);

  closeSidenav();
}

// console.log(sidebar);
window.onscroll = () => {
  //   console.log(window.scrollY);
  // if (window.scrollY > 60) {
  //   menuBtn.classList.remove("opaInactive");
  // } else {
  //   menuBtn.classList.add("opaInactive");
  // }
};

menuBtn.addEventListener("click", () => {
  menuBtn.classList.add("opaInactive");

  // console.log("hy");
  setTimeout(() => {
    menuBtn.style.display = "none";
    sidebar.style.width = "14rem";
    for (let i = 0; i < itemsidebar.length; i++) {
      itemsidebar[i].style.opacity = "1";
    }
    itemsidebarclose.style.opacity = "1";
    close.style.opacity = "1";
  }, 300);

  //   itemsidebar[0].style.display = "flex";
  for (let i = 0; i < itemsidebar.length; i++) {
    itemsidebar[i].style.display = "flex";
  }
  itemsidebarclose.style.display = "flex";
  sidebar.style.display = "flex";
  close.style.display = "flex";
});

const closeSidenav = () => {
  sidebar.style.width = "0rem";
  menuBtn.style.display = "block";
  close.style.opacity = "0";

  for (let i = 0; i < itemsidebar.length; i++) {
    itemsidebar[i].style.opacity = "0";
  }

  setTimeout(() => {
    for (let i = 0; i < itemsidebar.length; i++) {
      itemsidebar[i].style.display = "none";
    }
    close.style.display = "none";
    sidebar.style.display = "none";

    if (true) {
      menuBtn.classList.remove("opaInactive");
    } else {
      menuBtn.classList.add("opaInactive");
    }
  }, 300);
};
close.addEventListener("click", closeSidenav);
