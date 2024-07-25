(function ($) {
  'use strict';

  // Preloader JS
  jQuery(window).on('load', function () {
    jQuery(".preloader").fadeOut(500);
  });

})(jQuery);

$('.slider1').slick({
  dots: true,
  arrows: false,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  infinity: true,
  responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.slider2').slick({
  dots: true,
  arrows: false,
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
  infinity: true,
  responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.center').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 5,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 2000,
  infinity: true,
  responsive: [
    {
      breakpoint: 770,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

// Navbar JS

$(document).ready(function () {
  $('#navbarSupportedContent').on('show.bs.collapse', function () {
    $(this).css('transform', 'translateX(100%)').removeClass('collapsing').addClass('collapsing-right');
    setTimeout(() => {
      $(this).css('transform', 'translateX(0)');
    }, 10);
  });

  $('#navbarSupportedContent').on('hide.bs.collapse', function () {
    $(this).css('transform', 'translateX(0)').removeClass('collapsing').addClass('collapsing-left');
    setTimeout(() => {
      $(this).css('transform', 'translateX(100%)');
    }, 10);
  });

  $('#navbarSupportedContent').on('hidden.bs.collapse', function () {
    $(this).css('transform', '');
  });
});

// Gallery section Js

const modal = document.getElementsByClassName('idMyModal');
const img = document.getElementsByClassName('toZoom');
const modalImg = document.getElementsByClassName('modal-content');
for (let i = 0; i < img.length; i++) {
  img[i].onclick = function () {
    modal[i].style.display = "block";
    modalImg[i].src = this.src;
  }
}

var span = document.getElementsByClassName("close");
for (let i = 0; i < span.length; i++) {
  span[i].onclick = function () {
    modal[i].style.display = "none";
  }
}

// FAQs JS

let question = document.querySelectorAll(".question");

question.forEach(question => {
  question.addEventListener("click", event => {
    const active = document.querySelector(".question.active");
    if (active && active !== question) {
      active.classList.toggle("active");
      active.nextElementSibling.style.maxHeight = 0;
    }
    question.classList.toggle("active");
    const answer = question.nextElementSibling;
    if (question.classList.contains("active")) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = 0;
    }
  })
})

// Add row in Registration Table Js 

document.getElementById('addRowButton').addEventListener('click', function () {
  event.preventDefault();

  var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
  var currentRowCount = tableBody.rows.length;
  var newRow = tableBody.insertRow();

  var newCell1 = newRow.insertCell(0);
  var newCell2 = newRow.insertCell(1);
  var newCell3 = newRow.insertCell(2);
  var newCell4 = newRow.insertCell(3);
  var newCell5 = newRow.insertCell(4);
  var newCell6 = newRow.insertCell(5);
  var newCell7 = newRow.insertCell(6);
  var newCell8 = newRow.insertCell(7);
  var newCell9 = newRow.insertCell(8);

  var rowNumber = document.createElement('th');
  rowNumber.scope = "row";
  rowNumber.className = "col-no";
  rowNumber.innerText = currentRowCount + 1;
  newCell1.appendChild(rowNumber);

  newCell2.innerHTML = '<input type="text">';
  newCell3.innerHTML = '<input type="text">';
  newCell4.innerHTML = '<input type="tel">';
  newCell5.innerHTML = '<input type="email">';
  newCell6.innerHTML = '<input type="text">';
  newCell7.innerHTML = '<input type="number">';
  newCell8.innerHTML = '<input type="file">';
  newCell9.innerHTML = '<button class="removeRowButton">Remove</button>';

  newCell9.querySelector('.removeRowButton').addEventListener('click', function () {
    tableBody.removeChild(newRow);
    updateRowNumbers();
  });
});

function updateRowNumbers() {
  var tableBody = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
  var rows = tableBody.rows;
  for (var i = 0; i < rows.length; i++) {
    var cell = rows[i].cells[0];
    var thElement = cell.querySelector('th');

    if (thElement) {
      thElement.innerText = i + 1;
    } else {
      var rowNumber = document.createElement('th');
      rowNumber.scope = "row";
      rowNumber.className = "col-no";
      rowNumber.innerText = i + 1;
      cell.innerHTML = '';
      cell.appendChild(rowNumber);
    }
  }
}

document.querySelectorAll('.removeRowButton').forEach(function (button) {
  button.addEventListener('click', function () {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    updateRowNumbers();
  });
});

// Credit/debit card expiry date In Registration Js

document.addEventListener('DOMContentLoaded', function () {
  const currentYear = new Date().getFullYear();
  const expiryYearSelect = document.getElementById('expiryYear');

  for (let i = 0; i < 10; i++) {
    const option = document.createElement('option');
    option.value = currentYear + i;
    option.textContent = (currentYear + i).toString().substr(2);
    expiryYearSelect.appendChild(option);
  }
});

// Success popup Js

confirm_btn = document.getElementById("confirm-btn");
popup = document.querySelector(".popup");
popup_close = document.querySelector(".close");

confirm_btn.addEventListener('click', function () {
  const form = document.getElementById('paymentForm');
  if (form.checkValidity()) {
    popup.style.display = 'flex';
  } else {
    form.reportValidity();
  }
});

function checkValidity() {
  // Validation
  return true;
}

popup_close.addEventListener("click", function () {
  popup.style.display = "none";
  window.location.href = "feedback.html";
})

window.addEventListener("click", (event) => {
  if (event.target === popup) {
    popup.style.display = "none";
    window.location.href = "feedback.html";
  }
})
