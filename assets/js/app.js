/* Flash msg */
/* flash remove -> x */
$(document).ready(function () {
  $('.remove').click(function () {
    $('.flash').hide();
  });

  setTimeout(function () {
    $('.flash').fadeOut('slow');
  }, 3000);
});

/* Define UI */
const form = document.querySelector('form');
const departure = document.getElementById('departure');
const arrival = document.getElementById('arrival');

/* Datepicker */
const datepicker = document.getElementById('datepicker');
const datepicker2 = document.getElementById('datepicker2');


document.getElementById('customRadio1').addEventListener("click", (e) => {
  document.getElementById("datepickerArrival").style.visibility = "visible";
  document.getElementById("multipleDestinations").style.visibility = "hidden";
});

document.getElementById('customRadio2').addEventListener("click", (e) => {

  if (e.target.value === 'oneWay') {
    const oneWayValue = e.target.value;
    document.getElementById("datepickerArrival").style.visibility = "hidden";
    document.getElementById("collapse show").classList.remove('show');

  }

});
document.getElementById('customRadio3').addEventListener("click", (e) => {
  document.getElementById("multipleDestinations").style.visibility = "visible";
});



departure.addEventListener('keyup', goOff);
arrival.addEventListener('keyup', goOff);

departureCollapse.addEventListener('keyup', goOff);
arrivalCollapse.addEventListener('keyup', goOff);
departureCollapse2.addEventListener('keyup', goOff);
arrivalCollapse2.addEventListener('keyup', goOff);



function goOff(e) {

  let search = e.target.value;
  let apikey = 'a5cJ4bxftrJWSGGblfV4DViVbOumK3';

  let xhr = new XMLHttpRequest();

  xhr.open('GET', `https://api.loocpi.com/v1/locations?key=${apikey}&autocomplete=${search}`, true);
  xhr.onload = function () {
    //If response successful -alert success
    if (xhr.readyState == 4 && xhr.status == 200) {

      var suggestion = JSON.parse(this.responseText);
      var ar = Object.entries(suggestion);

      var newArr = [];

      for (var i = 0, len = ar.length; i < len; i++) {
        // inner loop applies to sub-arrays
        for (var j = 0, len2 = ar[i].length; j < len2; j++) {
          // accesses each element of each sub-array in turn

          if (ar[i][j].name != undefined) {
            newArr.push(ar[i][j].name);

            autocomplete(departure, newArr);
            autocomplete(arrival, newArr);

            autocomplete(departureCollapse, newArr);
            autocomplete(arrivalCollapse, newArr);
            autocomplete(departureCollapse2, newArr);
            autocomplete(arrivalCollapse2, newArr);

          }
        }
      }


    }

  }
  xhr.send();



}

function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false; }
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function (e) {
          /*insert the value for the autocomplete text field:*/
          inp.value = this.getElementsByTagName("input")[0].value;
          /*close the list of autocompleted values,
          (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
      }
    }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
      increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) { //up
      /*If the arrow UP key is pressed,
      decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}


