document.querySelector('form.create-form').addEventListener('submit', function(event){
    event.preventDefault();
    if(window.confirm('Add this project?') === true){
        this.submit();
    }
})
