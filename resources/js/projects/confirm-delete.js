const deleteFormEls = document.querySelectorAll('form.delete-form');
deleteFormEls.forEach((form) => {
    form.addEventListener('submit', function(event){
        event.preventDefault();
        const userChoice = window.confirm('Delete ' + this.getAttribute('data-project-title') + '?');
        if(userChoice){
            this.submit();
        }
    })
})


