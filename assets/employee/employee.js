$(document).ready(function () {
   $('.dataTable').DataTable({
         responsive: true
      })
      .columns.adjust()
      .responsive.recalc();
});

function toggleDD(myDropMenu) {
   document.getElementById(myDropMenu).classList.toggle("invisible");
}

function filterDD(myDropMenu, myDropMenuSearch) {
   var input, filter, ul, li, a, i;
   input = document.getElementById(myDropMenuSearch);
   filter = input.value.toUpperCase();
   div = document.getElementById(myDropMenu);
   a = div.getElementsByTagName("a");
   for (i = 0; i < a.length; i++) {
      if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
         a[i].style.display = "";
      } else {
         a[i].style.display = "none";
      }
   }
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
   if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
      var dropdowns = document.getElementsByClassName("dropdownlist");
      for (var i = 0; i < dropdowns.length; i++) {
         var openDropdown = dropdowns[i];
         if (!openDropdown.classList.contains('invisible')) {
            openDropdown.classList.add('invisible');
         }
      }
   }
}

let notification = document.getElementById("notification");
let checdiv = document.getElementById("chec-div");
let flag3 = false;
const notificationHandler = () => {
   if (!flag3) {
      notification.classList.add("translate-x-full");
      notification.classList.remove("translate-x-0");
      setTimeout(function () {
         checdiv.classList.add("hidden");
      }, 500);
      flag3 = true;
   } else {
      setTimeout(function () {
         notification.classList.remove("translate-x-full");
         notification.classList.add("translate-x-0");
      }, 500);
      checdiv.classList.remove("hidden");
      flag3 = false;
   }
};