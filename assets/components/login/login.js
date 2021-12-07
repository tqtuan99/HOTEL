var myIndex = 0;
carousel();

function carousel() {
   var i;
   var x = document.getElementsByClassName("slides");
   for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
   }
   myIndex++;
   if (myIndex > x.length) {
      myIndex = 1
   }
   x[myIndex - 1].style.display = "block";
   setTimeout(carousel, 2000); // Change image every 2 seconds
}

var getEyeElement = document.querySelectorAll(".far");
var getPassElement = document.querySelectorAll(".pass");

getEyeElement[0].onclick = function () {
   const type = getPassElement[0].getAttribute('type') === 'password' ? 'text' : 'password';
   getPassElement[0].setAttribute('type', type);
   this.classList.toggle('fa-eye-slash');
}

getEyeElement[1].onclick = function () {
   const type = getPassElement[1].getAttribute('type') === 'password' ? 'text' : 'password';
   getPassElement[1].setAttribute('type', type);
   this.classList.toggle('fa-eye-slash');
}