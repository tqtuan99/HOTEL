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

// GIỮ HIỆU ỨNG HOVER
let list = document.querySelectorAll('.sidebar li');

function activeLink() {
   list.forEach((item) =>
      item.classList.remove('hovered'));
   this.classList.add('hovered');
}
list.forEach((item) =>
   item.addEventListener('click', activeLink));

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


// // *SHOW DATA BUTTON FROM SIDEBAR
// let dataToMains = document.querySelectorAll('.js-show-data')
// let buttonShowAccount = document.querySelector('.js-show-account')
// let buttonShowEmploy = document.querySelector('.js-show-employ')
// let buttonShowRoom = document.querySelector('.js-show-room')
// let buttonShowStatis = document.querySelector('.js-show-statis')

// function showDataAccount() {
//    buttonShowAccount.classList.add('open')
// }

// function showDataEmploy() {
//    buttonShowEmploy.classList.add('open')
// }

// function showDataRoom() {
//    buttonShowRoom.classList.add('open')
// }

// function showDataStatis() {
//    buttonShowStatis.classList.add('open')
// }

// function hideData() {
//    buttonShowAccount.classList.remove('open')
//    buttonShowStatis.classList.remove('open')
//    buttonShowEmploy.classList.remove('open')
//    buttonShowRoom.classList.remove('open')
// }

// for (let i = 0; i < dataToMains.length; i++) {
//    if (!dataToMains[0].classList.contains('open')) {
//       dataToMains[0].addEventListener('click', hideData)
//       dataToMains[0].addEventListener('click', showDataAccount)
//    }
//    if (!dataToMains[1].classList.contains('open')) {
//       dataToMains[1].addEventListener('click', hideData)
//       dataToMains[1].addEventListener('click', showDataEmploy)
//    }
//    if (!dataToMains[2].classList.contains('open')) {
//       dataToMains[2].addEventListener('click', hideData)
//       dataToMains[2].addEventListener('click', showDataRoom)
//    }
//    if (!dataToMains[3].classList.contains('open')) {
//       dataToMains[3].addEventListener('click', hideData)
//       dataToMains[3].addEventListener('click', showDataStatis)
//    }
// }

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
      myModalEditEmploy.style.display = "none";
   }
}

// *MODAL edit EMPLOY
let myModalEditEmploy = document.querySelector('.my-modal-edit-employ');
let btnOpenModalEditEmploys = document.querySelectorAll('.open-modal-edit-employ');

for (const btnOpenModalEditEmploy of btnOpenModalEditEmploys) {
   btnOpenModalEditEmploy.onclick = function () {
      myModalEditEmploy.style.display = "flex";
   }
}

// *MODAL edit Account
let myModalEditAccount = document.querySelector('.my-modal-edit-account');
let btnOpenModalEditAccounts = document.querySelectorAll('.open-modal-edit-account');

for (const btnOpenModalEditAccount of btnOpenModalEditAccounts) {
   btnOpenModalEditAccount.onclick = function () {
      myModalEditAccount.style.display = "flex";
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
      myModalEditRoom.style.display = "none";
      myModalEditAccount.style.display = "none";
   }
}

//MODAL EDIT ROOM
let myModalEditRoom = document.querySelector('.my-modal-edit-room');
let btnOpenModalEditRooms = document.querySelectorAll('.open-modal-edit-room');

for (const btnOpenModalEditRoom of btnOpenModalEditRooms) {
   btnOpenModalEditRoom.onclick = function () {
      myModalEditRoom.style.display = "flex";
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