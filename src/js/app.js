const humbergerMenu = document.getElementById('humbergerMenu');
const navDropdownMenu = document.getElementById('navDropdownMenu');
const closeMenu = document.getElementById('xMark');
const filterClose = document.getElementById('filterXMark');
const filterOpen = document.getElementById('filterButton');
const filterId = document.getElementById('filterSection');

const filterOtherHeader = document.querySelector('.filterOtherHeader');
const filterOtherItems = document.querySelector('.filterOtherItems');


function showPopup(element) {
  // Get the paragraph content and set it in the popup
  const paragraphContent = element.nextElementSibling.textContent;
  document.getElementById("popup-text").textContent = paragraphContent;

  // Display the popup
  document.getElementById("popup").style.display = "block";

  // Add blur effect to the main content
  document.getElementById("mainContent").classList.add("blur");
}

function closePopup() {
  // Hide the popup
  document.getElementById("popup").style.display = "none";

  // Remove the blur effect from the main content
  document.getElementById("mainContent").classList.remove("blur");
}

// Close popup if the user clicks outside of it
window.onclick = function(event) {
  const popup = document.getElementById("popup");
  if (event.target == popup) {
    closePopup();
  }
}


filterOpen.addEventListener('click', function() {
  filterId.style.display = 'block';
  filterOpen.style.display = 'none';
  filterClose.style.display = 'block';
  filterId.style.position = 'fixed';
  filterId.style.left = '10px';
  filterId.style.top = '10px';
  filterId.style.zIndex = '20';

});

// Close the filter
filterClose.addEventListener('click', function() {
  filterId.style.display = 'none';
  filterClose.style.display = 'none';
  filterOpen.style.display = 'block';
});

// Initially, the filterOtherItems should be visible by default. If you want them hidden on page load, you can add this in CSS.
filterOtherItems.style.display = 'none';

// Add an event listener to toggle visibility when the "Others" header is clicked
filterOtherHeader.addEventListener('click', function() {
  // Check the current display style and toggle it
  if (filterOtherItems.style.display === 'none') {
    filterOtherItems.style.display = 'flex';
    filterOtherItems.style.flexDirection = 'column';
  } else {
    filterOtherItems.style.display = 'none';
  }
});


humbergerMenu.addEventListener('click', function() {
  // Toggle the display style of the dropdown menu between "none" and "block"
  if (navDropdownMenu.style.display === 'none' || navDropdownMenu.style.display === '') {
    navDropdownMenu.style.display = 'block';
    navDropdownMenu.style.position = 'absolute';
    navDropdownMenu.style.top = '100px';
    navDropdownMenu.style.left = '30px';
    humbergerMenu.style.display = 'none';
    closeMenu.style.display = 'block';
  } else {
    navDropdownMenu.style.display = 'none';
  }
});
closeMenu.addEventListener('click', function() {
  navDropdownMenu.style.display = 'none';
  closeMenu.style.display = 'none';
  humbergerMenu.style.display = 'block';
});

function showContent(buttonId) {
  // Get all content sections
  const contents = document.querySelectorAll('.heroContent');

  // Hide all content sections first
  contents.forEach(content => {
    content.style.display = 'none';
  });

  const contentToShow = document.getElementById(buttonId + 'Content');
  contentToShow.style.display = 'block';
}
function toggleOpacity(element) {
  element.classList.toggle('active');
}
function toggleAccordion(element){
  const content = element.previousElementSibling; // Changed from nextElementSibling to previousElementSibling
  const allContents = document.querySelectorAll('.accordionContent');

  allContents.forEach((item) => {
    if(item !== content){
      item.style.display = 'none';
    }
  });
  content.style.display = content.style.display === 'flex' ? 'none' : 'flex';
}




