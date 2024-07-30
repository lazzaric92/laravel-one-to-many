document.querySelector('form.edit-form').addEventListener('submit', function(event){
    event.preventDefault();
    if(window.confirm('Edit ' + this.getAttribute('data-project-title') + '?') === true){
        this.submit();
    }
})
