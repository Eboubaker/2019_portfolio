
function showContent(){
    window.onload = function(){
        document.body.style.backgroundImage = '';
        document.getElementById('page-wrapper').style.display='block';
        var menue = document.getElementsByClassName("navbar-toggler")[0];
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (event) {
                        event.preventDefault();
                        var target = document.querySelector(this.getAttribute('href'));
                        smoothScroll(target);
                        menue.dispatchEvent(createClickEvent());
                        }
                    );
                }
            );
        
        function createClickEvent(){
            return new MouseEvent('click', 
                    {
                        bubbles: true,
                        cancelable: true,
                        view: window
                    });
        }
        
        function smoothScroll(e){
            var ypos = window.scrollY + e.getBoundingClientRect().top - 80;
            window.scroll({top:ypos,left:0,behavior:'smooth'});
        }
    }
}
