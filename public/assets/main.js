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

// document.addEventListener('DOMContentLoaded', function(){
//     const navItem1 = document.getElementById('nav1')
//     const navItem2 = document.getElementById('nav2')
//     const navItem3 = document.getElementById('nav3')

//     navItem1.addEventListener('click', function(){
//         changeColor(navItem1);
//     })

//     navItem2.addEventListener('click', function(){
//         changeColor(navItem2);
//     })

//     navItem3.addEventListener('click', function(){
//         changeColor(navItem3);
//     })

//     function changeColor(selectedItem){
//         const navItems = document.querySelectorAll('a');
//         navItems.forEach(item => {
//             item.style.backgroundColor = '';
//         });
//     }

//     selectedItem.style.backgroundColor = '#FFFFF'
// })

// document.addEventListener('DOMContentLoaded', function() {
//     const navItems = document.querySelectorAll('.nav-items');

//     function setActivePage() {
//       const currentPage = window.location.pathname;

//       navItems.forEach(navItem => {
//         const href = navItem.getAttribute('href');

//         if (currentPage === href) {
//           navItem.classList.add('selected');
//         } else {
//           navItem.classList.remove('selected');
//         }
//       });
//     }

//     // Tambahkan event listener untuk setiap elemen navbar
//     navItems.forEach(item => {
//       item.addEventListener('click', function() {
//         // Hapus kelas 'selected' dari semua elemen navbar
//         navItems.forEach(navItem => {
//           navItem.classList.remove('selected');
//         });

//         // Tambahkan kelas 'selected' ke elemen yang dipilih
//         item.classList.add('selected');

//         // Simpan status halaman yang aktif ke sesi penyimpanan
//         sessionStorage.setItem('activePage', item.getAttribute('href'));
//       });
//     });

//     // Panggil setActivePage setelah DOM dimuat untuk mengatur elemen navbar yang sesuai dengan halaman yang sedang aktif
//     setActivePage();
//   });

//   setActivePage();



