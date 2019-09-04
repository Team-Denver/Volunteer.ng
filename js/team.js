// Show Team Members

const TeamList = document.querySelector(".container");
let team = [{
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  },
  {
    name: "Abasifreke Ekwere",
    track: "Front End",
    image: "https://res.cloudinary.com/dprmplqfj/image/upload/v1567631132/VolunteersNG/disaster_hmocam.jpg"
  }
];

let output = "";

team.forEach(team => {
  output += `
  <div class="member">
  <img src=${team.image} /> <br />
  <h3>${team.name}</h3>
  <p>
      Team Member <br><br>
      Project Role: ${team.track}
  </p>
  <br>
  <a href=""><i class="fab fa-facebook"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-instagram"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-twitter"></i> </a> &nbsp; &nbsp; &nbsp;
  <a href=""><i class="fab fa-youtube"></i> </a> &nbsp; &nbsp; &nbsp;
  </div>`;
});
TeamList.innerHTML = output;

//  Handle subscription to our emails (commented out for now)

const emailSub = document.querySelector(".submit");
const form = document.querySelector("form");

const handleSubmit = async () => {
  // const data = await fetch(url, {
  //   method: "POST",
  //   headers: {
  //     "Content-Type": "application/json"
  //   },
  //   body: JSON.stringify(data)
  // })
  //   .then(response => console.log("Success:", JSON.stringify(response)))
  //   .catch(error => console.error("Error:", error));
  form.reset();
};

emailSub.addEventListener("click", handleSubmit);