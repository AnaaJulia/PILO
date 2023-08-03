const sidebar = document.querySelector(`.sidebar`);

if (sidebar) {
  const shrink_btn = document.querySelector(".shrink-btn");
  const sidebar_links = document.querySelectorAll(".sidebar-links a");
  const active_tab = document.querySelector(".active-tab");
  const shortcuts = document.querySelector(".sidebar-links h4");
  const tooltip_elements = document.querySelectorAll(".tooltip-element");
  let activeIndex;
  shrink_btn.addEventListener("click", () => {
    document.body.classList.toggle("shrink");
    setTimeout(moveActiveTab, 400);
    shrink_btn.classList.add("hovered");
    setTimeout(() => {
      shrink_btn.classList.remove("hovered");
    }, 500);
  });
  function moveActiveTab() {
    let topPosition = activeIndex * 58 + 2.5;
    if (activeIndex > 3) {
      topPosition += shortcuts.clientHeight;
    }
    active_tab.style.top = `${topPosition}px`;
  }
  function changeLink() {
    sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
    this.classList.add("active");
    activeIndex = this.dataset.active;
    moveActiveTab();
  }
  sidebar_links.forEach((link) => link.addEventListener("click", changeLink));
}
// SIDEBAR 



// MULTI-STEP FORM

let currentStep = 1;
let currentProg = 1;

function next() {
  if(currentStep < 3) {
    document.querySelector(`#step-${currentStep}`).style.display="none";
    currentStep++;
    document.querySelector(`#step-${currentStep}`).style.display="block";

    currentProg++;
    document.getElementById(`prog-${currentProg}`).classList.add("active");

    document.getElementById(`prev-btn`).style.display="block";
    document.getElementById(`div-next-btn`).classList.remove("col-md-12");
    document.getElementById(`div-next-btn`).classList.add("col-md-6");

    if(currentStep == 3) {
      document.getElementById(`next-btn`).style.display="none";
      document.getElementById(`send-btn`).style.display="block";
    }

  }
  return false;
}

function prev() {
  if(currentStep > 1) {
    document.querySelector(`#step-${currentStep}`).style.display="none";
    currentStep--;
    document.querySelector(`#step-${currentStep}`).style.display="block";

    document.getElementById(`prog-${currentProg}`).classList.remove("active");
    currentProg--;

    document.getElementById(`next-btn`).style.display="block";
    document.getElementById(`send-btn`).style.display="none";

    if(currentStep == 1) {
      document.getElementById(`prev-btn`).style.display="none";
      document.getElementById(`div-next-btn`).classList.remove("col-md-6");
      document.getElementById(`div-next-btn`).classList.add("col-md-12");
    }
  }
  return false;
}

function filter() {
  document.getElementById("filtro").classList.toggle("active");
}

function editarperfil() {
  document.querySelector(".thisbtn").style.visibility="hidden";
  document.querySelector(".btn-area").style.visibility="visible"; 

  // Obtém todos os elementos <input> dentro do formulário
  // document.getElementsByTagName("input").removeAttribute("disabled");
  document.querySelector(".aaa").style.display="none";
  
}



$(document).ready(function() {
  $('.carrossel').each(function() {
    var carrossel = $(this);
    var carrosselInner = carrossel.find('.carrossel-inner');
    var items = carrosselInner.find('.carrossel-item');
    var itemWidth = items.outerWidth(true);
    var visibleItems = 3.5; // número de itens visíveis


    var currentPosition = 0;
    var prevButton = carrossel.find('.prev');
    var nextButton = carrossel.find('.next');

    updateButtonVisibility();

    carrossel.find('.carrossel-control').click(function(e) {
      e.preventDefault();
      var direction = $(this).hasClass('prev') ? 'prev' : 'next';

      if (direction === 'prev' && currentPosition > 0) {
        currentPosition--;
      } else if (direction === 'next' && currentPosition < items.length - visibleItems) {
        currentPosition++;
      }

      carrosselInner.css('transform', 'translateX(-' + (currentPosition * itemWidth) + 'px)');
      updateButtonVisibility();
    });

    function updateButtonVisibility() {
      prevButton.toggle(currentPosition > 0);
      nextButton.toggle(currentPosition < items.length - visibleItems);
    }
  });
});
