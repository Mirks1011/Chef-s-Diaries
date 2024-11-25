const form = document.querySelector('form');

form.addEventListener('keypress', function (event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    form.submit();
  }
});