function myFunction() {
    var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
}

const searchItem = $$('.nav-link');
searchItem.forEach((search, index) => {
    search.onclick = function () {
        $('.nav-link.active').classList.remove('active')
        this.classList.add('active');
        // console.log(this);
    }
});
