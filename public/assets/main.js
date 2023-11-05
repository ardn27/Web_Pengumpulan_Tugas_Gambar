// Dapatkan tombol pemicu dropdown
var dropdownBtn = document.querySelector(".dropbtn");

// Dapatkan konten dropdown
var dropdownContent = document.querySelector(".dropdown-content");

// Tambahkan event listener untuk tombol pemicu
dropdownBtn.addEventListener("click", function() {
  dropdownContent.classList.toggle("show");
});

// Tutup dropdown saat mengklik di luar dropdown
window.addEventListener("click", function(event) {
  if (!event.target.matches('.dropbtn')) {
    if (dropdownContent.classList.contains('show')) {
      dropdownContent.classList.remove('show');
    }
  }
});

// var formPost = document.getElementById("form-posting");

// var loginUser = "dani"
// var password = "grobogan123"

// if(loginUser === "dani" && password==="grobogan123"){
//     formPost.style.display = "block"

// }


