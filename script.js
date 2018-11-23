document.addEventListener("DOMContentLoaded", function(event) {
  const highlightedItems = document.querySelectorAll('a[class="media"]');
  highlightedItems.forEach(function(userItem) {
    userItem.dataset.lightbox = 'lightbox';
  });
});
