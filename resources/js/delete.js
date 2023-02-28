const deleteFilms = document.querySelectorAll('form.form-deleter');

deleteFilms.forEach((fimls) => {
    fimls.addEventListener('submit', function (event) {
        event.preventDefault();
        const FilmElementName = fimls.getAttribute('data-element-name');
        const confirmPopUp = window.confirm(`Are you sure you want to delete ${FilmElementName}?`);
        if (confirmPopUp) this.submit();
    })
});