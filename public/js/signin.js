const signinSubmit = () => {
  const inputText = document.querySelectorAll(".input-text");
  const inputTextArea = document.querySelector(".input-textarea").values;

  Array.from(inputText).map((e) => {
    console.log(e.value);
  });
};
