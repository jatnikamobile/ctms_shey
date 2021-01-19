function clearForm(form) {
  form = typeof form === 'string' ? document.querySelector(form) : form
  let type, elements = form.elements;
  for (i=0; i<elements.length; i++) {
    type = elements[i].type.toLowerCase();
    switch(type) {
      case "text":
      case "password":
      case "textarea":
      case "hidden":
        elements[i].value = "";
        break;

      case "radio":
      case "checkbox":
        elements[i].checked = false;
        break;

      case "select-one":
      case "select-multi":
        elements[i].selectedIndex = elements[i].item(0).value-0 ? -1 : 0;
        break;
    }
    elements[i].dispatchEvent(new CustomEvent('change'));
  }
}

document.querySelectorAll('.btn.clear').forEach(btn => {
  btn.addEventListener('click', (ev) => clearForm(ev.target.form || ev.target.dataset.form))
})
