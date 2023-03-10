const check = document.getElementById("check");
const navbar = document.getElementById("navbar");
check.addEventListener("click", function () {
  if (check.checked == true) {
    navbar.style.display = "block";
  } else {
    navbar.style.display = "none";
  }
});

const dashboard = document.getElementById("dashboard");
dashboard.addEventListener("click", function () {
  window.location.href = "./dashboard.php";
});
const biodata = document.getElementById("biodata");
biodata.addEventListener("click", function () {
  window.location.href = "./biodata.php";
});
const dokumen = document.getElementById("dokumen");
dokumen.addEventListener("click", function () {
  window.location.href = "./dokumen.php";
});
const logout = document.getElementById("logout");
logout.addEventListener("click", function () {
  $(document).ready(function () {
    Swal.fire({
      icon: "question",
      title: "Anda yakin ingin keluar?",
      showDenyButton: true,
      confirmButtonText: "Iya",
      denyButtonText: `Tidak`,
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "./backend/auth/logout.php";
      }
    });
  });
});
