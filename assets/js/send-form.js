/*
 * Script js para enviar formularios
 */

document.getElementById("form").addEventListener("submit", function(event) {
  event.preventDefault(); 

  var formData = new FormData(this); 

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'index.php');
  xhr.send(formData);
});

document.getElementById("formMail").addEventListener("submit", function(event) {
  event.preventDefault(); 

  var formData = new FormData(this); 

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'index.php');
  xhr.send(formData);
});

