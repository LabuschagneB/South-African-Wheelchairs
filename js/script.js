function scrollTrigger(selector, options = {}){
    let els = document.querySelectorAll(selector)
    els = Array.from(els)
    els.forEach(el => {
        addObserver(el, options)
    })
}

function addObserver(el, options){
    if(!('IntersectionObserver' in window)){
        if(options.cb){
            options.cb(el)
        }else{
            entry.target.classList.add('active')
        }
        return
    }
    let observer = new IntersectionObserver((entries, observer) => { 
        entries.forEach(entry => {
            if(entry.isIntersecting){
                if(options.cb){
                    options.cb(el)
                }else{
                    entry.target.classList.add('active')
                }
                observer.unobserve(entry.target)
            }
        })
    }, options)
    observer.observe(el)
}


scrollTrigger('.scroll-reveal', {
    rootMargin: '-200px',
})


const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
  exampleModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget
    const recipient = button.getAttribute('data-bs-product')
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')
    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient
  })
}

function printProduct(divId) {
    const content = document.getElementById(divId).innerHTML;
    const myWindow = window.open("", "", "height=600,width=800");
    myWindow.document.write("<html><head><title>Print</title>");
    myWindow.document.write("</head><body>");
    myWindow.document.write(content);
    myWindow.document.write("</body></html>");
    myWindow.document.close();
    myWindow.focus();
    myWindow.print();
    myWindow.close();
  }
  
const isMobile = (navigator.userAgentData && navigator.userAgentData.mobile) || /Mobi/i.test(navigator.userAgent);
if (isMobile) {
    document.getElementById('print').style.display = 'none';
}


