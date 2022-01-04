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

/*Filter dropdown options*/
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


// *MODAL DELETE
let myModal = document.querySelector('.my-modal');
let btnOpenModals = document.querySelectorAll('.open-modal');
let btnCloseModals = document.querySelectorAll('.close-modal');

for (const btnOpenModal of btnOpenModals) {
   btnOpenModal.onclick = function () {
      myModal.style.display = "flex";
   }
}

for (const btnCloseModal of btnCloseModals) {
   btnCloseModal.onclick = function () {
      myModal.style.display = "none";
   }
}

window.onclick = function (event) {
   if (event.target == myModal) {
      myModal.style.display = "none";
   }
}

// *MODAL ADD EMPLOY
let myModalAddEmploy = document.querySelector('.my-modal-employ');
let btnOpenModalAddEmploy = document.querySelector('.open-modal-employ');
let btnCloseModalAddEmploys = document.querySelectorAll('.close-modal-employ');

btnOpenModalAddEmploy.onclick = function () {
   myModalAddEmploy.style.display = "flex";
}
for (const btnCloseModalAddEmploy of btnCloseModalAddEmploys) {
   btnCloseModalAddEmploy.onclick = function () {
      myModalAddEmploy.style.display = "none";
   }
}

// *MODAL ADD ROOM
let myModalAddRoom = document.querySelector('.my-modal-room');
let btnOpenModalAddRoom = document.querySelector('.open-modal-room');
let btnCloseModalAddRooms = document.querySelectorAll('.close-modal-room');

btnOpenModalAddRoom.onclick = function () {
   myModalAddRoom.style.display = "flex";
}
for (const btnCloseModalAddRoom of btnCloseModalAddRooms) {
   btnCloseModalAddRoom.onclick = function () {
      myModalAddRoom.style.display = "none";
   }
}


//MODAL search-statistical

let handleShowStatisticals = document.querySelectorAll('.js-search-statistical');
let showStatisticals = document.querySelectorAll('.js-show-statistical');

for (let i = 0; i < handleShowStatisticals.length; i++) {
   handleShowStatisticals[i].addEventListener('click', function () {
      if(i<4)
         for (let j = 0; j < 4; j++) {
            j == i ? showStatisticals[j].classList.remove('hidden') : showStatisticals[j].classList.add('hidden') ;
            j == i ? handleShowStatisticals[j].classList.add('active') : handleShowStatisticals[j].classList.remove('active') ;
         }
      else
         for (let j = 4; j < 8; j++) {
            j == i ? showStatisticals[j].classList.remove('hidden') : showStatisticals[j].classList.add('hidden') ;
            j == i ? handleShowStatisticals[j].classList.add('active') : handleShowStatisticals[j].classList.remove('active') ;
         }
   });
}