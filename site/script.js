// script.js

// Add event listeners for dynamic elements
document.addEventListener('DOMContentLoaded', function() {
  // Add event listener for delete button
  document.querySelectorAll('.delete-btn').forEach(function(btn) {
    btn.addEventListener('click', function(event) {
      // Prevent default link behavior
      event.preventDefault();
      
      // Get the iframe ID from the button's href attribute
      const iframeId = btn.href.split('=')[1];
      
      // Send an AJAX request to delete the iframe
      fetch(`delete-iframe.php?id=${iframeId}`, {
        method: 'GET',
      })
      .then(response => response.text())
      .then(message => {
        console.log(message);
        // Remove the iframe group from the DOM
        btn.closest('.draggable-iframe-group').remove();
      })
      .catch(error => console.error(error));
    });
  });
  
  // Add event listener for add button
  document.getElementById('add-button').addEventListener('click', function(event) {
    // Prevent default link behavior
    event.preventDefault();
    
    // Open the form-recipes.php page in a new tab
    window.open('form-recipes.php', '_blank');
  });
  
  // Add event listener for resizable iframes
  document.querySelectorAll('.resizer').forEach(function(resizer) {
    resizer.addEventListener('mousedown', function(event) {
      // Get the iframe container
      const iframeContainer = resizer.closest('.iframe-container');
      
      // Set the initial iframe width and height
      const initialWidth = iframeContainer.offsetWidth;
      const initialHeight = iframeContainer.offsetHeight;
      
      // Add event listeners for mousemove and mouseup
      document.addEventListener('mousemove', function(event) {
        // Calculate the new iframe width and height
        const newWidth = initialWidth + (event.clientX - resizer.offsetLeft);
        const newHeight = initialHeight + (event.clientY - resizer.offsetTop);
        
        // Update the iframe container's width and height
        iframeContainer.style.width = `${newWidth}px`;
        iframeContainer.style.height = `${newHeight}px`;
      });
      
      document.addEventListener('mouseup', function() {
        // Remove the event listeners
        document.removeEventListener('mousemove', null, false);
        document.removeEventListener('mouseup', null, false);
      });
    });
  });
});