// Fungsi untuk menampilkan pop-up konfirmasi
function showPopup() {
    document.getElementById("overlay").classList.add("show");
  }
  function closePopup() {
    document.getElementById("overlay").classList.remove("show");
  }
  
  // Fungsi untuk menampilkan pop-up konfirmasi berhasil
  function deleteConfirmed() {
    document.getElementById("overlay").classList.remove("show");  
    document.getElementById("success-overlay").classList.add("show"); 
  }
  function closeSuccessPopup() {
    document.getElementById("success-overlay").classList.remove("show"); 
  }
  