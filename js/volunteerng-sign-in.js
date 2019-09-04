//For switching different tabs.
const signUpButton = document.querySelector("#signUp");
const signInButton = document.querySelector("#signIn");
const container = document.querySelector(".container");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
  shuffleWord();
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});

//Changes different words in signup tab when signup button is clicked.
const shuffleWord = () => {
  let words = [
    "About 80 percent of Small and Medium Enterprises, SMEs, in Nigeria fail within the first five years of their existence due to lack of experience and other wrong business practices. Do you need a capable and professional hand willing to volunteer for a project ?",
    "According to a report by Sarah C. and Alicia W. 67% of people found volunteer opportunities online in 2014 vs 34% in 2006.",
  ];
  const wordFromArr = Math.floor(Math.random() * 3);
  const wordFromString = words[wordFromArr];

  document.getElementById("change").innerText = wordFromString;
};