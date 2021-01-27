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

;(function() {
  let btnSelector = '.swal-open';

  window.SwalForm = Swal.mixin({
      width: '35%',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
  })

  const swal_form = (html, data) => {
    let swals = []
    return SwalForm.fire({
      html,
      didOpen(modal,a,s,d,f) {
        console.info({_this:this,a,s,d,f})
        swals.push({modal})
        window[data.swalDidOpen](modal)
      },
      preConfirm: (z,x,c,v,b) => {
        console.info({z,x,c,v,b})
        return window[data.swalPreConfirm](z,x,c,v,b)
      },
    })
  }

  window.swal_fire = (opts) => {
    // console.info({html})
    opts.width = '35%'
    opts.didOpen = window[opts.didOpen]
    // console.info('didOpen', opts)
    // opts.didOpen =
    //  (x) => console.info('didOpen', ll1 = x)
    // opts.didRender = (x) => console.info('didRender', ll2 = x)
    // opts.showDenyButton = true
    opts.showCancelButton = true
    return Swal.fire(opts)
  }

  const action = (btn) => {
    let data = btn.dataset
    if (data.swalForm) {
      wretch(btn.href).get()
        .text(x => swal_form(x, data))
        .catch(err => swal_fire({html:err.message, icon:'error'}))
    }
  }

  document.addEventListener('click', (ev) => {
    let btns = document.querySelectorAll(btnSelector)
    for (let i=0; i<btns.length; i++) {
      if (ev.target == btns[i]) {
        ev.preventDefault()
        return action(ev.target)
      }
    }
  })
})()
