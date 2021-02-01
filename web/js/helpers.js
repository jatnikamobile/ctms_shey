!(function () {
  const alert = (text, icon, opts = {}) => {
    opts.text = text
    opts.icon = icon
    opts.width = opts.width || '35%'
    return Swal.fire(opts)
  }
  window.swal_success = (m) => alert(m, 'success')
  window.swal_error = (m) => alert(m, 'error')

  const swal_static = (o) => Swal.fire({ ...o, allowOutsideClick: false, allowEscapeKey: false })

  const swal_form = (opts) => {
    return swal_static({
      html: opts.html,
      didRender: (modal) => window[opts.swalDidOpen](modal),
      preConfirm: async (_wretch, html, form) => {
        form = document.querySelector('.swal2-content form')
        _wretch = (d) => wretch(form.action).body(d).post().text()
        html = await window[opts.swalPreConfirm](_wretch, new FormData(form))
        if (typeof html !== 'string') return true
        Swal.update({ html })
        return false
      },
      width: '35%',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
    })
  }

  yii.confirm = (text, ok, cancel, opts) => {
    opts = {text, showCancelButton: true, icon: 'question', allowOutsideClick: false}
    return Swal.fire(opts).then((res) => res.value ? ok && ok() : cancel && cancel())
  }

  const isTag = (n, t) => n.nodeName === t
  const isBtn = (n) => isTag(n, 'A') || isTag(n, 'BUTTON')
  const rules = [
    // [ condition(node), action(event, node) ],
    [
      (b) => b.classList.contains('showModalButton') && isBtn(b),
      (e, btn, data) => {
        e.preventDefault()
        data = btn.dataset
        if (data.modalType === 'form') {
          return wretch(btn.href).get()
            .text((x) => { data.html = x; swal_form(data) })
            .catch((err) => swal_error(err.message))
        }
        if (data.modalType === 'embed-pdf') {
          let html = `<object type="application/pdf" data="${btn.href}" style="width:100%; height:81vh">No Support</object>`;
          return swal_static({ html, width: '80%', heightAuto: false, title: 'Dokumen ' + data.name })
        }
      }
    ],
    [
      (b) => b.classList.contains('clearForm') && isBtn(b),
      (e, btn, form) => {
        form = btn.form || document.querySelector(btn.dataset.form)
        for (i = 0; i < form.length; i++) {
          switch (form[i].type.toLowerCase()) {
            case 'text':
            case 'password':
            case 'textarea':
            case 'hidden':
              form[i].value = '';
              break;

            case 'radio':
            case 'checkbox':
              form[i].checked = false;
              break;

            case 'select-one':
            case 'select-multi':
              form[i].selectedIndex = form[i].item(0).value - 0 ? -1 : 0;
              break;
          }
          form[i].dispatchEvent(new CustomEvent('change'))
        }
      }
    ],
  ]
  document.addEventListener('click', (ev, node, i) => {
    node = ev.target
    do {
      for (i = 0; i < rules.length; i++) {
        if (rules[i][0](node)) return rules[i][1](ev, node)
      }
      node = node.parentNode
    } while (node !== document.body)
  })

})()
